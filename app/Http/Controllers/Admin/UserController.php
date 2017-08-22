<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AglUser;
use App\Models\AglPermission;
use App\Models\AglUserPermission;
use Illuminate\Support\Facades\Session;
use Image;

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
            if($password!=$user->password){

                return redirect('/admin/log-in')->with('fail','Username or password wrong!  ');
            }
            else{
                Session::put('username',$user->username);
                Session::put('user_id',$user->id);
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
            $p=AglPermission::get();
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
                        if ($request->permission_ . $item->id == 1) {
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
                $user->password=md5($request->password);
                if($request->hasFile('file'))
                {
                    $image = $request->file('file');
                    $filename  = 'user_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/users/' . $filename);
                    Image::make($image->getRealPath())->resize(150, 150)->save($path);
                    $user->avatar=$filename;
                }
                $user->save();
                return redirect('admin/user')->with('success','Cập nhật user thành công');
            }

        }
        catch (\Exception $e)
        {
            return redirect('admin/user')->with('failed','Thêm user thất bại');
        }
    }
    public function Logout(Request $request){
        $request->session()->flush();
        return redirect('/admin/log-in');
    }
}
