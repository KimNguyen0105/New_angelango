<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/9/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AglPermission;
use App\Models\AglUserPermission;
use Illuminate\Http\Request;
use Image;

class PermissionController extends Controller
{

    public function Index()
    {
        $p = AglPermission::get();
        return view('admin.permission.index', ['permission' => $p]);
    }
    public function getPermission($id)
    {
        if($id==0)
        {
            $parent=AglPermission::where('parent_id',0)->get();
            return view('admin.permission.create', ['parents'=>$parent]);
        }
        else{
            $p = AglPermission::find($id);
            $parent=AglPermission::where('parent_id',0)->get();
            return view('admin.permission.edit', ['permission' => $p,'parents'=>$parent]);
        }

    }
    public function postPermission($id, Request $request)
    {
        try{
            if($id==0)
            {
                $p=new AglPermission();
                $p->name=$request->name;
                $p->link=$request->link;
                $p->note=$request->note;
                $p->parent_id=$request->parent_id;
                $p->save();
                return redirect('admin/permission')->with('success','Thêm permission thành công');
            }
            else{
                $p=AglPermission::find($id);
                $p->name=$request->name;
                $p->link=$request->link;
                $p->parent_id=$request->parent_id;
                $p->note=$request->note;
                $p->save();
                return redirect('admin/permission')->with('success','Cập nhật permission thành công');
            }
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('admin/permission')->with('failed','cập nhật permission thất bại');
        }
    }
}