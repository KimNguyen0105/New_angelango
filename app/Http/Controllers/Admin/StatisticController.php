<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AglAccount;
use Carbon\Carbon;
class StatisticController extends Controller
{
    //
    public function getProductAble(){
        try{
            $products=DB::table('agl_product')->orderBy('view','desc')->get();
            return view('admin.statistic.able',['products'=>$products]);
        }
        catch (\Exception $e)
        {
            return redirect('admin');
        }
    }
    public function Sellers()
    {
        try{
            $products=DB::table('agl_order_detail')
                ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                ->join('agl_order','agl_order_detail.order_id','=','agl_order.id')
                ->select('agl_product.id',DB::raw('SUM(agl_order_detail.quantity) as total'),
                    'agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                ->groupBy('agl_product.id','agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                ->get();
            return view('admin.statistic.sellers',['products'=>$products,'from'=>date('Y/m/d'),'to'=>date('Y/m/d')]);
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('admin');
        }
    }
    public function SellersFromTo(Request $request)
    {
        try{
            if($request->to!=null && $request->from)
            {
                $from=date_format(date_create($request->from),'Y-m-d H:i:s');
                $to=date_format(date_create($request->to),'Y-m-d H:i:s');
                $products=DB::table('agl_order_detail')
                    ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                    ->join('agl_order','agl_order_detail.order_id','=','agl_order.id')
                    ->whereBetween('agl_order.created_at', [$from, $to])
                    ->select('agl_product.id',DB::raw('SUM(agl_order_detail.quantity) as total'),
                        'agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                    ->groupBy('agl_product.id','agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                    ->get();
            }
            else{
                if($request->to==null)
                {
                    $from=date_format(date_create($request->from),'Y-m-d H:i:s');
                    $products=DB::table('agl_order_detail')
                        ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                        ->join('agl_order','agl_order_detail.order_id','=','agl_order.id')
                        ->where('agl_order.created_at', [$from, date('Y-m-d H:i:s')])
                        ->select('agl_product.id',DB::raw('SUM(agl_order_detail.quantity) as total'),
                            'agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                        ->groupBy('agl_product.id','agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                        ->get();
                }
                else{
                    $to=date_format(date_create($request->to),'Y-m-d H:i:s');
                    $products=DB::table('agl_order_detail')
                        ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                        ->join('agl_order','agl_order_detail.order_id','=','agl_order.id')
                        ->where('agl_order.created_at', '<', $to)
                        ->select('agl_product.id',DB::raw('SUM(agl_order_detail.quantity) as total'),
                            'agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                        ->groupBy('agl_product.id','agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                        ->get();
                }
            }


            return view('admin.statistic.sellers',['products'=>$products,'from'=>$request->from,'to'=>$request->to]);
        }
        catch (\Exception $e)
        {
            return redirect('admin');
        }
    }
    public function Account()
    {
        try{
            $users=DB::table('agl_order_detail')
                ->join('agl_order','agl_order_detail.order_id','=','agl_order.id')
                ->join('agl_account','agl_order.account_id','=','agl_account.id')
                ->select('agl_account.id',DB::raw('SUM(agl_order_detail.quantity) as total'),
                    'agl_account.name','agl_account.email','agl_account.phone_number')
                ->groupBy('agl_account.id',
                    'agl_account.name','agl_account.email','agl_account.phone_number')
                ->orderBy('total','desc')
                ->get();
            return view('admin.statistic.account',['users'=>$users]);
        }
        catch (\Exception $e)
        {
            return redirect('admin');
        }
    }
    public function OrderAccount($id)
    {
        try{
            $user=AglAccount::find($id);
            $orders=DB::table('agl_order')
                ->join('agl_order_detail','agl_order_detail.order_id','=','agl_order.id')
                ->join('agl_account','agl_order.account_id','=','agl_account.id')
                ->join('agl_order_status','agl_order.status_id','=','agl_order_status.id')
                ->where('agl_order.account_id',$id)
                ->select('agl_order.id','agl_order.created_at','agl_order.status_id',
                    'agl_order_status.title_vi as status','agl_order.order_id')
                ->orderBy('agl_order.created_at','desc')
                ->distinct()
                ->get();
            foreach ($orders as $order)
            {
                $detail=DB::table('agl_order_detail')
                    ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                    ->where('agl_order_detail.order_id',$order->id)
                    ->select('agl_product.title_vi','agl_product.avatar','agl_order_detail.quantity')
                    ->get();
                $order->detail=$detail;
            }
            return view('admin.statistic.account_detail',['orders'=>$orders,'user'=>$user]);
        }
        catch (\Exception $e)
        {
            return redirect('admin');
        }
    }
    public function Revenue()
    {
        try{
            $products=DB::table('agl_order_detail')
                ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                ->join('agl_order','agl_order_detail.order_id','=','agl_order.id')
                ->select('agl_product.id',DB::raw('SUM(agl_order_detail.quantity) as total'),
                    'agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                ->groupBy('agl_product.id','agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                ->get();
            $total=DB::table('agl_order')
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->select(DB::raw('SUM(total_price) as total'))
                ->value('total');
            return view('admin.statistic.revenue',['products'=>$products,'total'=>$total,
                'month'=>date('m'),'year'=>date('Y')
            ]);
        }
        catch (\Exception $e)
        {
            return redirect('admin');
        }
    }
    public function RevenueMonth(Request $request)
    {
        try{
            $date=$request->month;
            $year=substr($date,3);
            $month=substr($date,0,-5);
            $products=DB::table('agl_order_detail')
                ->join('agl_product','agl_order_detail.product_id','=','agl_product.id')
                ->join('agl_order','agl_order_detail.order_id','=','agl_order.id')
                ->whereMonth('agl_order.created_at','=',$month)
                ->whereYear('agl_order.created_at','=',$year)
                ->select('agl_product.id',DB::raw('SUM(agl_order_detail.quantity) as total'),
                    'agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                ->groupBy('agl_product.id','agl_product.title_vi','agl_product.title_en','agl_product.avatar')
                ->get();
            $total=DB::table('agl_order')
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->select(DB::raw('SUM(total_price) as total'))
                ->value('total');
            if($total==null)
            {
                $total=0;
            }
            return view('admin.statistic.revenue',['products'=>$products,'total'=>$total,
                'month'=>$month,'year'=>$year
            ]);
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('admin');
        }
    }
}
