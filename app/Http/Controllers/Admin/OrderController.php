<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AglOrder;
use App\Models\AglOrderStatus;
use App\Models\AglOrderDetail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function getStatusOrder()
    {
        $status=AglOrderStatus::orderBy('id','asc')->get();
        return view('admin.order.status',['status'=>$status]);
    }
    public function postStatusOrder(Request $request)
    {
        try{
            $id=$request->id;
            if($id==0)
            {
                $status=new AglOrderStatus();
                $status->title_vi=$request->title_vi;
                $status->title_en=$request->title_en;
                $status->sort_order=$request->sort_order;
                $status->save();
                return redirect('admin/status')->with('success','Thêm trạng thái thành công');
            }
            else{
                $status=AglOrderStatus::find($id);
                $status->title_vi=$request->title_vi;
                $status->title_en=$request->title_en;
                $status->sort_order=$request->sort_order;
                $status->save();
                return redirect('admin/status')->with('success','Cập nhật trạng thái thành công');
            }

        }
        catch (\Exception $e)
        {
            return redirect('admin/status')->with('failed','Cập nhật trạng thái thất bại');
        }

    }
    public function DeleteStatusOrder($id)
    {
        try{
            $status=AglOrderStatus::where('id',$id)->delete();
            return redirect('admin/status')->with('success','Xóa trạng thái thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/status')->with('failed','Xóa trạng thái thất bại');
        }

    }
    public function getOrder()
    {
        try{

            $order=array();
            $status=AglOrderStatus::orderBy('sort_order','asc')->get();
            foreach ($status as $statu)
            {
                $item=AglOrder::where('status_id',$statu->id)->orderBy('updated_at','desc')->get();
                array_push($order, $item);
            }
            return view('admin.order.home',['orders'=>$order,'status'=>$status]);
        }
        catch (\Exception $e)
        {
            return redirect('admin');
        }
    }
    public function getOrderByID($id)
    {
        try{
            $order=DB::table('agl_order')
                ->join('agl_order_status','agl_order.status_id','=','agl_order_status.id')
                ->where('agl_order.id',$id)
                ->select('agl_order.*','agl_order_status.title_vi as status_name')->first();
            $status=AglOrderStatus::orderBy('sort_order','asc')->get();
            $order_detail=DB::table('agl_order_detail')
                ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                ->join('agl_size_product','agl_order_detail.product_size_id','=','agl_size_product.id')
                ->where('agl_order_detail.order_id',$id)
                ->select('agl_order_detail.*','agl_product.avatar','agl_product.title_vi','agl_size_product.size')
                ->get();
            return view('admin.order.order_detail',['order'=>$order,'order_details'=>$order_detail,'status'=>$status]);
        }
        catch (\Exception $e)
        {
            return redirect('admin');
        }
    }
    public function postOrderStatus($id, Request $request)
    {
        try{
            $order=AglOrder::find($id);
            $order->status_id=$request->status;
            $order->save();
            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }
    public function DeleteOrder($id)
    {
        try{
            AglOrder::where('id',$id)->delete();
            return redirect('admin/order')->with('success','Xóa thành công');
        }
        catch (\Exception $e)
        {
            return redirect('admin/order')->with('failed','Xóa thất bại');
        }
    }
}
