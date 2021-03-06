<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AglUser;
use App\Models\AglPermission;
use App\Models\AglUserPermission;
use Illuminate\Support\Facades\Session;
use Image;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){

        $email = $request->get('email');
        $password=$request->get('password');
        $user = AglUser::where('email',$email)->where('status',1)->first();
        if($user!=null){
            if(md5($password)!=$user->password){
                return redirect('/admin/log-in')->with('fail','Username or password wrong!  ');
            }
            else{
                Session::put('username',$user->email);
                Session::put('user_id',$user->id);
                Session::put('avatar',$user->avatar);
                return redirect('/admin');
            }
        }
        else{
            return redirect('/admin/log-in')->with('fail','Account not exist!');
        }
    }
    public function getUser()
    {
        $users=AglUser::get();
        return view('admin.user.home',['users'=>$users]);
    }
    public function getUserByID($id)
    {
        try{
            $p=AglPermission::where('parent_id',0)->get();
            if($id==0)
            {
                return view('admin.user.create_user',['permission'=>$p]);
            }
            else{
                $user=AglUser::find($id);
                $permissionUser=AglUserPermission::where('user_id',$id)->select('permission_id')->get();
                if($user)
                {
                    return view('admin.user.edit_user',['user'=>$user,'permission'=>$p,'permissionUser'=>$permissionUser]);
                }
                else{
                    return view('admin.user.create_user');
                }
            }
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('admin/user')->with('failed','Lấy thông tin user thất bại');
        }
    }
    public function Profile($id)
    {
        try{
            $user=AglUser::find($id);
            if($user)
            {
                return view('admin.user.profile',['user'=>$user]);
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/user')->with('failed','Lấy thông tin user thất bại');
        }
    }
    public function postProfile($id, Request $request)
    {
        try{

                $user=AglUser::find($id);
                $user->username=$request->username;
                if($request->password){
                    $user->password=md5($request->password);
                }
                if($request->hasFile('file'))
                {
                    if($user->avatar!="default.png")
                    {
                        if(file_exists("images/users/".$user->avatar))
                        {
                            unlink("images/users/".$user->avatar);
                        }
                    }
                    $image = $request->file('file');
                    $filename  = 'user_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/users/' . $filename);
                    Image::make($image->getRealPath())->resize(150, 150)->save($path);
                    $user->avatar=$filename;
                }
                if ($user->save())
                {
                    return redirect('admin/profile/'.$id)->with('success','Cập nhật thông tin thành công');
                }

        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('admin/profile/'.$id)->with('failed','Cập nhật thông tin thất bại');
        }
    }

    public function postUser($id, Request $request)
    {
        try{
            if($id==0) {
                $user = new AglUser();
                $user->username = $request->username;
                $user->email = $request->email;
                $user->status = 1;
                $user->password = md5($request->password);
                if ($request->hasFile('file')) {
                    $image = $request->file('file');
                    $filename = 'user_' . time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/users/' . $filename);
                    Image::make($image->getRealPath())->resize(150, 150)->save($path);
                    $user->avatar = $filename;
                } else {
                    $user->avatar = 'default.png';
                }
                if ($user->save())
                {
                    $p = AglPermission::get();
                    foreach ($p as $item) {
                        if ($request->get('permission_'.$item->id)==1) {
                            $u_p = new AglUserPermission();
                            $u_p->user_id = $user->id;
                            $u_p->permission_id = $item->id;
                            $u_p->save();
                        }
                    }
                    return redirect('admin/user')->with('success', 'Thêm user thành công');
                }
            }
            else{
                $user=AglUser::find($id);
                $user->username=$request->username;
                $user->email=$request->email;
                if($request->password){
                    $user->password=md5($request->password);
                }
                if($request->hasFile('file'))
                {
                    if($user->avatar!="default.png")
                    {
                        if(file_exists("images/users/".$user->avatar))
                        {
                            unlink("images/users/".$user->avatar);
                        }
                    }
                    $image = $request->file('file');
                    $filename  = 'user_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/users/' . $filename);
                    Image::make($image->getRealPath())->resize(150, 150)->save($path);
                    $user->avatar=$filename;
                }
                if ($user->save())
                {
                    $p = AglPermission::get();
                    AglUserPermission::where('user_id',$id)->delete();
                    foreach ($p as $item) {
                        if ($request->get('permission_'.$item->id)==1) {
                            $u_p = new AglUserPermission();
                            $u_p->user_id = $user->id;
                            $u_p->permission_id = $item->id;
                            $u_p->save();
                        }
                    }
                    return redirect('admin/user')->with('success','Cập nhật user thành công');
                }

            }

        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('admin/user')->with('failed','Thêm user thất bại');
        }
    }
    public function DeleteUser($id)
    {
        try{
            $user=AglUser::find($id);
            if($user)
            {
                AglUserPermission::where('user_id')->delete();
                if($user->avatar!="default.png")
                {
                    if(file_exists("images/users/".$user->avatar))
                    {
                        unlink("images/users/".$user->avatar);
                    }
                }
                $user->delete();
                return redirect('admin/user')->with('success','Xóa user thành công');
            }
            else{
                return redirect('admin/user')->with('failed','Xóa user thất bại');
            }
        }
        catch (\Exception $e)
        {
            return redirect('admin/user')->with('failed','Xóa user thất bại');
        }
    }
    public function Logout(Request $request){
        $request->session()->flush();
        return redirect('/admin/log-in');
    }
    public static function getPermissionUserById()
    {
        $user_permission = DB::table('agl_user_permission')
            ->join('agl_permission', 'agl_user_permission.permission_id', '=', 'agl_permission.id')
            ->where('agl_user_permission.user_id', Session::get('user_id'))
            ->get();
        foreach ($user_permission as $item)
        {
            $p=AglPermission::where('parent_id',$item->id)->get();
            $item->arr=$p;
        }
        return view('admin.partial.permission', [
            'user_permission' => $user_permission
        ]);
    }

}
