<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AglSubscribe;
use Image;

class SubscribeController extends Controller
{
    //
    public function getSubscribe()
    {
        $subscribe = AglSubscribe::orderBy('id', 'desc')->get();
        return view('admin.subscribe.home', [
            'subscribe' => $subscribe
        ]);
    }
    
    public function getEditSubscribe($id)
    {
        try{
            $subscribe=AglSubscribe::find($id);
            return view('admin.subscribe.edit_subscribe',['subscribe'=>$subscribe]);
        }
        catch (\Exception $e)
        {
            return view('admin.subscribe.home')->with('failed', 'Cập nhật thất bại');
        }
    }
    public function postEditSubscribeDoc($id, Request $request)
    {
       
           
       $subscribe=AglSubscribe::find($id);

        if (!$subscribe->status) {
            DB::table('agl_subscribe')
              ->where('id', $id)
              ->update(['status' => 1]);
        }

        return ['state' => 'success'];
         
    }
    public function postEditSubscribeChuaDoc($id, Request $request)
    {
       
       $subscribe=AglSubscribe::find($id);
       //dd(12);
        if (!$subscribe->status) {
            DB::table('agl_subscribe')
              ->where('id', $id)
              ->update(['status' => 0]);
        }

        return ['state' => 'success'];
         
    }
    public function DeleteSubscribe($id)
    {
        
            $subscribe=AglSubscribe::find($id);
         
            $subscribe->delete();
                
            return redirect('/admin/subscribe')->with('success', 'Xóa  thành công');
            
    }
}
