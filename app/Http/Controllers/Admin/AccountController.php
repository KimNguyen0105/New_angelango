<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 7/7/2017
 * Time: 10:27 AM
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\HbbUser;
use DB;
use Hash;
use md5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AglAccount;
class AccountController extends Controller{


    public function getAccount(){
        $account = AglAccount::where('status',1)->orderBy('id', 'desc')->get();
        return view('admin.account.home',['account'=>$account]);
    }

     public function getCreateAccount(){
        
        return view('admin.account.create_account');
    }

    public function postCreateAccount(Request $request){
        $account = new AglAccount();
       
        $account->name = $request->name;
        if ($request->input('password')) {
            $this->validate($request,
                [
                    'txtRePass' =>'same:password',
                    
                ],
                [
                    'txtRePass.same'=>'nhập lại mật khẩu không khớp',
                   
                ]);
            $pass = $request->input('password');
            $account->password = md5($pass);

        }
        $email = $account->email;
        
        if($email != $request->input('email'))
       {
        if ($request->input('email')) {
            $this->validate($request,
                [
                     'email' => 'required|unique:agl_account,email|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/'
                ],
                [
                      'email.unique' => 'Email đã tồn tại',
                      'email.regex' => 'Email không đúng định dạng'
                ]);
            
            // $edit_banner->banner_title =$request->input('txtTitle');
        }
       }
        $account->email = $request->email;
         $account->status = 1;
        $account->save();

        return redirect('/admin/account')->with('success', 'Thêm account thành công');
    }

    public function getEditAccount($id){
        $account = AglAccount::find($id);
        return view('admin.account.edit_account',['account'=>$account]);
    }

    public function postEditAccount($id,Request $request){
        $account = AglAccount::find($id);
       
        $account->name = $request->name;
        if ($request->input('password')) {
            $this->validate($request,
                [
                    'txtRePass' =>'same:password',
                    
                ],
                [
                    'txtRePass.same'=>'nhập lại mật khẩu không khớp',
                   
                ]);
            $pass = $request->input('password');
            $account->password = md5($pass);

        }
        $email = $account->email;
        
        if($email != $request->input('email'))
       {
        if ($request->input('email')) {
            $this->validate($request,
                [
                     'email' => 'required|unique:agl_account,email|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/'
                ],
                [
                      'email.unique' => 'Email đã tồn tại',
                      'email.regex' => 'Email không đúng định dạng'
                ]);
            
            // $edit_banner->banner_title =$request->input('txtTitle');
        }
       }
        $account->email = $request->email;

        $account->save();

        return redirect('/admin/account')->with('success', 'Cập nhật account thành công');
    }
    public function DeleteAccount($id){
        $account = AglAccount::find($id);
        $account->status = 0;
        $account->save();
        return redirect('/admin/account')->with('success', 'Xóa account thành công');
    }
    
}