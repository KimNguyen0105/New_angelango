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
    public function postPermission(Request $request)
    {
        try{
            $id=$request->id;
            if($id==0)
            {
                $p=new AglPermission();
                $p->name=$request->name;
                $p->link=$request->link;
                $p->note=$request->note;
                $p->save();
                return redirect('admin/permission')->with('success','Thêm permission thành công');
            }
            else{
                $p=AglPermission::find($id);
                $p->name=$request->name;
                $p->link=$request->link;
                $p->note=$request->note;
                $p->save();
                return redirect('admin/permission')->with('success','Cập nhật permission thành công');
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/permission')->with('failed','cập nhật permission thất bại');
        }
    }
}