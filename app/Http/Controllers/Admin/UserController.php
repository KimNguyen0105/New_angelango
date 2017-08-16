<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AglUser;
use Illuminate\Support\Facades\Session;
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
    public function postSignup(Request $request)
    {

    }
    public function Logout(Request $request){
        $request->session()->flush();
        return redirect('/admin/log-in');
    }
}
