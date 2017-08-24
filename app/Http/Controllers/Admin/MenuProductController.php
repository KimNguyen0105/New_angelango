<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AglMenuProduct;
use Image;
use App\Models\AglProduct;

class MenuProductController extends Controller
{
    //
    public function getMenuProduct()
    {
        $menu_product = AglMenuProduct::where('status',1)->orderBy('id', 'desc')->get();
        return view('admin.menu_product.home', [
            'menu_product' => $menu_product
        ]);
    }
    public function getCreateMenuProduct()
    {
        return view('admin.menu_product.create_menu_product');
    }
    public function postCreateMenuProduct(Request $request)
    {
        try{
            $menu_product=new AglMenuProduct();
            $menu_product->title_vi=$request->title_vi;
            $menu_product->title_en=$request->title_en;
            $menu_product->status=1;
            
            if($menu_product->save())
            {
                return redirect('/admin/menu-product')->with('success', 'Thêm danh mục sản phẩm thành công');
            }
            else{
                return redirect('/admin/menu-product/create-menu-product')->with('failed', 'Thêm danh mục sản phẩm thất bại');
            }
        }
        catch (\Exception $e)
        {
            return view('admin.menu_product.create_menu_product')->with('failed', 'Thêm danh mục sản phẩm thất bại');
        }
    }
    public function getEditMenuProduct($id)
    {
        try{
            $menu_product=AglMenuProduct::find($id);
            return view('admin.menu_product.edit_menu_product',['menu_product'=>$menu_product]);
        }
        catch (\Exception $e)
        {
            return view('admin.menu_product.home')->with('failed', 'Cập nhật thất bại');
        }
    }
    public function postEditMenuProduct($id, Request $request)
    {
        try{
            $menu_product=AglMenuProduct::find($id);
            if($menu_product)
            {
                $menu_product->title_vi=$request->title_vi;
                $menu_product->title_en=$request->title_en;
                $menu_product->status=1;
               
                if($menu_product->save())
                {
                    return redirect('/admin/menu-product')->with('success', 'Cập nhật công');
                }
                else{
                    return redirect('/admin/menu-product/edit-menu-product/'.$id)->with('failed', 'Cập nhật thất bại');
                }
            }

        }
        catch (\Exception $e)
        {
            return view('admin.menu_product.home')->with('failed', 'Cập nhật thất bại');
        }
    }
    public function DeleteMenuProduct($id)
    {
        try{

            $product = AglProduct::where('menu_product_id',$id)->get();
            // dd($product);
            $menu_product=AglMenuProduct::find($id);
            if($menu_product)
            {
               $menu_product->status=0;

                if($menu_product->save())
                {
                    foreach ($product as $key => $item) {
                        $item->status=0;
                        $item->save();
                    }
                   
                    return redirect('/admin/menu-product')->with('success', 'Xóa  thành công');
                }
                else{
                    return redirect('/admin/menu-product')->with('failed', 'Xóa  thất bại');
                }
            }
        }
        catch (\Exception $e)
        {
            dd($e);
            return redirect('/admin/menu-product')->with('failed', 'Xóa  thất bại');
        }
    }
}
