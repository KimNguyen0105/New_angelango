<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AglContact;

class ContactController extends Controller
{
    //
    public function getContact()
    {
        $contact1 = AglContact::where('status',0)->orderBy('updated_at','desc')->get();
        $contact2 = AglContact::where('status',1)->orderBy('updated_at','desc')->get();
        return view('admin.contact.home',['contact1'=>$contact1, 'contact2'=>$contact2]);
    }
    public function getContactByID($id)
    {
        $contact = AglContact::find($id);
        return view('admin.contact.detail_contact',['contact'=>$contact]);
    }
    public function postContact($id, Request $request)
    {
        try{
            $contact = AglContact::find($id);
            $contact->status=$request->status;
            $contact->save();
            return redirect('admin/contact')->with('success','Cập nhật trạng thái liên hệ thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/contact')->with('failed','Cập nhật trạng thái liên hệ thất bại');
        }
    }
    public function DeleteContact($id)
    {
        try{
            AglContact::where('id',$id)->delete();
            return redirect('admin/contact')->with('success','Xóa liên hệ thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/contact')->with('failed','Xóa liên hệ thất bại');
        }
    }
}
