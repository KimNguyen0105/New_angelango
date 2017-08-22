<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\AglProduct;
use App\Models\AglMenuProduct;
use App\Models\AglSizeProduct;
use App\Models\AglColorProduct;
use App\Models\AglProductImage;
use App\Models\AglSpecificProduct;
use App\Models\AglProductDiscount;

use Image;

class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $product = AglProduct::where('status',1)->orderBy('updated_at', 'desc')->get();
        
        return view('admin.product.home', [
            'product' => $product
        ]);
    }
    public function getCreateProduct()
    {
        $menu_product = AglMenuProduct::where('status',1)->get();
        $size = AglSizeProduct::orderBy('id', 'desc')->get();

       
        return view('admin.product.create_product',['menu_product'=>$menu_product,'size'=>$size]);
    }
    public function removeimg($id_img)
    {
        $product_img = AglProductImage::find($id_img);
        if(file_exists('images/product_image/'.$product_img->link)){
            unlink('images/product_image/'.$product_img->link);
        }
        $product_img->delete();
        return $id_img;
    }

    public function removecolor($id_color, $id_product)
    {
        $product_color = AglColorProduct::find($id_color);

        $img_color = AglProductImage::where('color',$id_color)->where('product_id',$id_product)->get();
        foreach($img_color as $item)
        {
             $product_img = AglProductImage::find($item->id);
            if(file_exists('images/product_image/'.$product_img->link)){
                unlink('images/product_image/'.$product_img->link);
            }
            $product_img->delete();
        }
        $product_color->delete();
        return $id_color;
    }
    public function addcolor($id)
    {
        $product_mau=new AglColorProduct();
        $product_mau->color = '#e01ab5';
        $product_mau->id_product = $id;
        $product_mau->save();
        return $product_mau->id;
    }
    public function postCreateProduct(Request $request)
    {
        
        try{
            $product=new AglProduct();
            $product->title_vi=$request->title_vi;
            $product->title_en=$request->title_en;
            $product->content_vi=$request->content_vi;
            $product->content_en=$request->content_en;
            $product->price=$request->price;
            $product->is_discount=$request->is_discount;
            $product->rating=3;
            $product->view=3;
            $product->status=1;
            $product->menu_product_id=$request->menu_product;

            $product->seo_title=$request->seo_title;
            $product->seo_keyword=$request->seo_keyword;
            $product->seo_author=$request->seo_author;
            $product->seo_description=$request->seo_description;
            //save hình đại diện
            if($request->hasFile('file'))
            {
                $image = $request->file('file');
                $filename  = 'product_'.time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('images/product/' . $filename);
                Image::make($image->getRealPath())->resize(360, 460)->save($path);
                $product->avatar=$filename;
            }

            if($product->save())
            {
                $id_produc = $product->id;
                if($request->is_discount==1){
                    $discount = new AglProductDiscount();
                     $discount->product_id = $id_produc;
                     $discount->price_discount = $request->pricekm;
                     $discount->date = $request->ngaykm;
                     $discount->save();
                }
                
                //save size sản phẩm
                $size = $request->size;
                 foreach($size as $item){
                    $product_size = new AglSpecificProduct();
                    $product_size->product_id = $id_produc;
                    $product_size->size_id = $item;
                    $product_size->save();
                 }
                 //save màu sản phẩm
                 $i =0;
                 $color = $request->mau;
                 // dd($color);
                 foreach($color as $item){
                     $product_mau=new AglColorProduct();
                     $product_mau->color = $item;
                     $product_mau->id_product = $id_produc;
                     $product_mau->save();
                     $id_color = $product_mau->id;
                     //save hình sản phẩm theo màu

                    if($request->hasFile('file-multi'.$i))
                    {
                        
                        $file_ary = $request->file('file-multi'.$i);
                        $j=1;

                        foreach ($file_ary as $file) {
                            $product_img = new AglProductImage();

                            $filename='product'.$i.'_'.$j.time().'.' . $file->getClientOriginalExtension();
                            $path = public_path('images/product_image/' . $filename);
                            Image::make($file->getRealPath())->resize(135, 200)->save($path);
                            $j++;
                            
                            $product_img->link=$filename;
                            $product_img->product_id = $id_produc;
                            $product_img->color =$id_color;
                            $product_img->save();
                        }

                    }
                    $i++;
                }
                return redirect('/admin/product')->with('success', 'Thêm sản phẩm thành công');
            }
            else{
               
                return redirect('/admin/product/create-product')->with('failed', 'Thêm sản phẩm thất bại');
            }
        }
        catch (\Exception $e)
        {
            
            return view('admin.product.create_product')->with('failed', 'Thêm sản phẩm thất bại');
        }
        

    }
    public function getEditProduct($id)
    {
         try{

            $product = DB::table('agl_product')->where('agl_product.id',$id)->join('agl_menu_product','agl_product.menu_product_id','=','agl_menu_product.id')->select('agl_product.*','agl_menu_product.title_vi as menu_product_title_vi')->first();
            $discount = AglProductDiscount::where('product_id',$id)->first();
            $menu_product = AglMenuProduct::where('status',1)->get();
            $size = AglSizeProduct::orderBy('id', 'desc')->get()->toArray();
            $product_size = DB::table('agl_specific_products')->where('product_id',$id)->join('agl_size_product','agl_specific_products.size_id','=','agl_size_product.id')->select('agl_size_product.id')->get();
              // dd($product);
            $product_color = DB::table('agl_color_product')->where('id_product',$product->id)->get();
            $product_img = DB::table('agl_product_image')->where('product_id',$product->id)->get();

            if($product)
            {
                return view('admin.product.edit_product',['product'=>$product,'product_color'=>$product_color,'product_img'=>$product_img,'product_size'=>$product_size,'menu_product'=>$menu_product,'size'=>$size,'discount'=>$discount]);
            }
            else{
                return view('admin.product.home');
            }
        }
        catch (\Exception $e)
        {
            return view('admin.product.home');
        }
    }
    public function postEditProduct($id, Request $request)
    {
        
        try{
            $product=AglProduct::find($id);
            if($product)
            {
                $product->title_vi=$request->title_vi;
                $product->title_en=$request->title_en;
                $product->content_vi=$request->content_vi;
                $product->content_en=$request->content_en;
                $product->price=$request->price;
                $product->is_discount=$request->is_discount;
                $product->rating = $request->rating;
                $product->view=3;
                $product->status=1;
                $product->menu_product_id=$request->menu_product;

                $product->seo_title=$request->seo_title;
                $product->seo_keyword=$request->seo_keyword;
                $product->seo_author=$request->seo_author;
                $product->seo_description=$request->seo_description;

                if($request->hasFile('file'))
                {
                    if(file_exists("images/product/".$product->avatar))
                    {
                        unlink("images/product/".$product->avatar);
                    }
                    $image = $request->file('file');
                    $filename  = 'product_'.time() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('images/product/' . $filename);
                    Image::make($image->getRealPath())->resize(135, 200)->save($path);
                    $product->avatar=$filename;
                }
             
                if($product->save())
                {

                    //save size sản phẩm
                    
                    if($request->is_discount==1){
                        $discount = AglProductDiscount::where('product_id',$id)->first();

                        if($discount == null){
                            $discount = new AglProductDiscount();
                            $discount->product_id = $id;
                            $discount->price_discount = $request->pricekm;
                            $discount->date = $request->ngaykm;
                            $discount->save();
                        }
                        else{
                            $discount->product_id = $id;
                            $discount->price_discount = $request->pricekm;
                            $discount->date = $request->ngaykm;
                            $discount->save();
                        }
                        
                    }
                     if($request->is_discount==0){
                        
                        if(AglProductDiscount::where('product_id',$id))
                        {
                            $discount = AglProductDiscount::where('product_id',$id);
                            $discount->delete();
                        }
                        
                    }

                    $size = $request->size;
                    AglSpecificProduct::where('product_id',$id)->delete();
                    foreach($size as $item){
                        $product_size =new AglSpecificProduct();
                        $product_size->product_id = $id;
                        $product_size->size_id = $item;
                        $product_size->save();
                    }
                    //save màu sản phẩm
                 $i =0;
                 $color = AglColorProduct::where('id_product',$id)->get();
                 foreach($color as $item){
                     $product_mau= AglColorProduct::find($item->id);
                     $product_mau->color = $request->get('color'.$item->id);
                     $product_mau->id_product = $id;
                     $product_mau->save();
                     //save hình sản phẩm theo màu
                    if($request->hasFile('file-multi'.$item->id))
                    {
                        
                        $file_ary = $request->file('file-multi'.$item->id);
                        $j=1;

                        foreach ($file_ary as $file) {
                            $product_img = new AglProductImage();

                            $filename='product'.$i.'_'.$j.time().'.' . $file->getClientOriginalExtension();
                            $path = public_path('images/product_image/' . $filename);
                            Image::make($file->getRealPath())->resize(135, 200)->save($path);
                            $j++;
                            
                            $product_img->link=$filename;
                            $product_img->product_id = $id;
                            $product_img->color =$item->id;
                            $product_img->save();
                        }

                    }
                    $i++;
                }

                    return redirect('/admin/product')->with('success', 'Cập nhật sản phẩm thành công');
                }
                else{
                    return redirect('/admin/product/edit-product/'.$id)->with('failed', 'Cập nhật sản phẩm thất bại');
                }
            }

        }
        catch (\Exception $e)
        {
            return view('admin.product.home')->with('failed', 'Cập nhật sản phẩm thất bại');
        }
    }
    public function DeleteProduct($id)
    {
        try{
            $product=AglProduct::find($id);
            $product_image=AglProductImage::where('product_id',$product->id);
            if($product)
            {

                if(file_exists("images/product/".$product->avatar))
                {
                    unlink("images/product/".$product->avatar);
                }
                if(file_exists("images/product_image/".$product_image->link))
                {
                    unlink("images/product_image/".$product_image->link);
                }

                $product->status=0;
                if($product->save())
                {
                    return redirect('/admin/product')->with('success', 'Xóa sản phẩm thành công');
                }
                else{
                    return redirect('/admin/product')->with('failed', 'Xóa sản phẩm thất bại');
                }
            }
        }
        catch (\Exception $e)
        {
            return redirect('/admin/product')->with('failed', 'Xóa sản phẩm thất bại');
        }
    }
}
