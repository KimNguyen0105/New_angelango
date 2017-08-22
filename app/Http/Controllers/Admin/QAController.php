<?php

namespace App\Http\Controllers\Admin;

use App\Models\AglCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AglQA;
use App\Models\AglRequestDesignMessage;
use App\Models\AglRequestDesign;
use Illuminate\Support\Facades\DB;

class QAController extends Controller
{
    public function getQA()
    {
        $qa=DB::table('agl_q_a')
            ->join('agl_account','agl_q_a.account_id','=','agl_account.id')
            ->join('agl_product','agl_q_a.product_id','=','agl_product.id')
            ->orderBy('agl_q_a.updated_at','desc')
            ->select('agl_account.name','agl_q_a.id','agl_q_a.content','agl_product.avatar','agl_product.title_vi')
            ->get();
        return view('admin.qa.home',['qas'=>$qa]);
    }
    public function DeleteQA($id)
    {
        try{
            DB::table('agl_q_a')->where('id',$id)->delete();
            return redirect('/admin/qa')->with('success','Xóa thành công');
        }
        catch (\Exception $e)
        {
            return redirect('/admin/qa')->with('failed','Xóa thất bại');
        }
    }
    public function getRequest()
    {
        $request1=DB::table('agl_request_design')
//            ->join('agl_request_design_message','agl_request_design_message.request_design_id','=','agl_request_design.id')
            ->join('agl_product','agl_request_design.product_id','=','agl_product.id')
            ->join('agl_order','agl_request_design.order_id','=','agl_order.id')
            ->where('agl_request_design.status',-1)
            ->orderBy('agl_request_design.updated_at','desc')
            ->select('agl_request_design.id',
                'agl_product.avatar','agl_product.title_vi','agl_order.id as order_id')
            ->get();
        $request2=DB::table('agl_request_design')
//            ->join('agl_request_design_message','agl_request_design_message.request_design_id','=','agl_request_design.id')
            ->join('agl_product','agl_request_design.product_id','=','agl_product.id')
            ->join('agl_order','agl_request_design.order_id','=','agl_order.id')
            ->where('agl_request_design.status',1)
            ->orderBy('agl_request_design.updated_at','desc')
            ->select('agl_request_design.id',
                'agl_product.avatar','agl_product.title_vi','agl_order.id as order_id')
            ->get();
        $request3=DB::table('agl_request_design')
//            ->join('agl_request_design_message','agl_request_design_message.request_design_id','=','agl_request_design.id')
            ->join('agl_product','agl_request_design.product_id','=','agl_product.id')
            ->join('agl_order','agl_request_design.order_id','=','agl_order.id')
            ->where('agl_request_design.status',0)
            ->orderBy('agl_request_design.updated_at','desc')
            ->select('agl_request_design.id',
                'agl_product.avatar','agl_product.title_vi','agl_order.id as order_id')
            ->get();
        return view('admin.request.home',['requests1'=>$request1,
            'requests2'=>$request2,
            'requests3'=>$request3
        ]);
    }
    public function getRequestByID($id)
    {
        try{
            $request=DB::table('agl_request_design')
                ->join('agl_product','agl_request_design.product_id','=','agl_product.id')
                ->join('agl_order','agl_request_design.order_id','=','agl_order.id')
                ->join('agl_account','agl_request_design.account_id','=','agl_account.id')
                ->where('agl_request_design.id',$id)
                ->select('agl_request_design.id','agl_request_design.status',
                    'agl_product.avatar','agl_product.title_vi','agl_order.id as order_id','agl_account.name','agl_account.id as account_id')
                ->first();
            $request_details=DB::table('agl_request_design_message')
                ->join('agl_user','agl_request_design_message.user_id','=','agl_user.id')
                ->where('agl_request_design_message.request_design_id',$id)
                ->orderBy('agl_request_design_message.id','asc')
                ->select('agl_request_design_message.id','agl_user.username',
                    'agl_request_design_message.message','agl_request_design_message.type',
                    'agl_request_design_message.updated_at')
                ->get();
            return view('admin.request.request_detail',['request'=>$request,'request_details'=>$request_details]);
        }
        catch (\Exception $e)
        {
            return redirect('/admin/request')->with('failed', 'Xem yêu cầu thất bại');
        }
    }
    public function PostRequestByID($id, Request $request)
    {
        try{
            $message=new AglRequestDesignMessage();
            $message->request_design_id=$id;
            $message->type=1;
            $message->message=$request->message;
            $message->user_id=session('user_id');
            if($message->save())
            {
                $r=AglRequestDesign::find($id);
                $r->status=1;
                $r->save();
                return redirect('/admin/request/'.$id);
            }
            else
            {
                return redirect('/admin/request')->with('failed', 'Trả lời thất bại');
            }
        }
        catch (\Exception $e)
        {
            return redirect('/admin/request')->with('failed', 'Trả lời thất bại');
        }
    }
    public function DeleteRequest($id)
    {
        try{
            $message=AglRequestDesign::find($id);
            $message->status=0;
            $message->save();
            return redirect('/admin/request')->with('success', 'Thư đã được chuyển vào thư xóa!');
        }
        catch (\Exception $e)
        {
            return redirect('/admin/request')->with('failed', 'Xóa thất bại');
        }
    }
}
