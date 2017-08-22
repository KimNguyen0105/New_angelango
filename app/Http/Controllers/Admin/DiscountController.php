<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AglProductDiscount;
use Image;
use App\Models\AglProduct;

class DiscountController extends Controller
{
    //
    public function getDiscount()
    {
        $date = date('Y/m/d');
        $discount = DB::table('agl_product_discount')->join('agl_product','agl_product_discount.product_id','=','agl_product.id')->select('agl_product_discount.id as discount_id','agl_product_discount.product_id as product_id','agl_product_discount.price_discount as price_discount','agl_product_discount.date as date','agl_product.*')->get();

        $dem_tat_ca = count($discount);
        $dem_het_han = count(DB::table('agl_product_discount')->where('date','<',$date)->get());
        $dem_con_han = count(DB::table('agl_product_discount')->where('date','>',$date)->get());
        return view('admin.discount.home', [
            'discount' => $discount,'dem_tat_ca'=>$dem_tat_ca,'date'=>$date,'dem_het_han'=>$dem_het_han,'dem_con_han'=>$dem_con_han
        ]);
    }
     public function hethan()
    {
         $date = date('Y/m/d');
        $discount = DB::table('agl_product_discount')->where('date','<',$date)->join('agl_product','agl_product_discount.product_id','=','agl_product.id')->select('agl_product_discount.id as discount_id','agl_product_discount.product_id as product_id','agl_product_discount.price_discount as price_discount','agl_product_discount.date as date','agl_product.*')->get();
      
         $dem_tat_ca = count(DB::table('agl_product_discount')->get());
        $dem_het_han = count(DB::table('agl_product_discount')->where('date','<',$date)->get());
        $dem_con_han = count(DB::table('agl_product_discount')->where('date','>',$date)->get());
        return view('admin.discount.home', [
            'discount' => $discount,'dem_tat_ca'=>$dem_tat_ca,'date'=>$date,'dem_het_han'=>$dem_het_han,'dem_con_han'=>$dem_con_han
        ]);
    }
     public function conhan()
    {
       $date = date('Y/m/d');
        $discount = DB::table('agl_product_discount')->where('date','>',$date)->join('agl_product','agl_product_discount.product_id','=','agl_product.id')->select('agl_product_discount.id as discount_id','agl_product_discount.product_id as product_id','agl_product_discount.price_discount as price_discount','agl_product_discount.date as date','agl_product.*')->get();

         $dem_tat_ca = count(DB::table('agl_product_discount')->get());
        $dem_het_han = count(DB::table('agl_product_discount')->where('date','<',$date)->get());
        $dem_con_han = count(DB::table('agl_product_discount')->where('date','>',$date)->get());
        return view('admin.discount.home', [
            'discount' => $discount,'dem_tat_ca'=>$dem_tat_ca,'date'=>$date,'dem_het_han'=>$dem_het_han,'dem_con_han'=>$dem_con_han
        ]);
    }
     public function getEditDiscount($id)
    {
        $discount=AglProductDiscount::find($id);
         return view('admin.discount.edit_discount', [
            'discount' => $discount
        ]);
    }
    
    public function postEditDiscount($id, Request $request)
    {
        
        try{
            $discount=AglProductDiscount::find($id);
            if($discount)
            {
                $discount->price_discount=$request->price_discount;
                $discount->date=$request->ngaykm;
                if($discount->save())
                {
                    return redirect('/admin/discount')->with('success', 'Cập nhật khuyến mãi thành công');
                }
                else{
                    return redirect('/admin/discount/'.$id)->with('failed', 'Cập nhật khuyến mãi thất bại');
                }
            }

        }
        catch (\Exception $e)
        {
            return view('admin.discount.home')->with('failed', 'Cập nhật khuyến mãi thất bại');
        }
    }
    public function DeleteDiscount($id)
    {
        // try{
             $product_id_discount = DB::table('agl_product_discount')->where('agl_product_discount.id',$id)->join('agl_product','agl_product_discount.product_id','=','agl_product.id')->select('agl_product_discount.id as discount_id','agl_product_discount.product_id as product_id','agl_product_discount.price_discount as price_discount','agl_product_discount.date as date','agl_product.*')->first();
            $discount = AglProductDiscount::find($id);
            if($discount)
            {
                $product=AglProduct::where('id',$product_id_discount->product_id)->first();
                $discount->delete();

                $product->is_discount=0;
                if($product->save())
                {
                    return redirect('/admin/discount')->with('success', 'Xóa khuyến mãi thành công');
                }
                else{
                    return redirect('/admin/discount')->with('failed', 'Xóa khuyến mãi thất bại');
                }
            }
        // }
        // catch (\Exception $e)
        // {
        //     return redirect('/admin/discount')->with('failed', 'Xóa khuyến mãi thất bại');
        // }
    }
}
