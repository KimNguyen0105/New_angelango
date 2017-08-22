<?php
/**
 * Created by PhpStorm.
 * User: ThangLe
 * Date: 8/22/2017
 * Time: 2:30 PM
 */

namespace App\Http\Controllers;


use App\Models\AglColorProduct;
use App\Models\AglProduct;
use App\Models\AglProductImage;
use App\Models\AglSizeProduct;
use App\Models\AglSpecificProduct;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function Index()
    {

        Session::put('active','home');
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        Session::put('active','product');
        $product = AglProduct::where('status', 1)->orderBy('updated_at','desc')->get();
        return view('page.product', [
            'product' => $product
        ]);
    }

    public function Detail($id)
    {

        Session::put('active','home');
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        Session::put('active','product');
        $product = AglProduct::find($id);

        $color = AglColorProduct::where('id_product', $id)->get();
//        dd($color);
        $size = AglSpecificProduct::where('product_id', $id)->select('size_id')->get();
        $image = AglProductImage::where('product_id', $id)->get();
        $relation = AglProduct::where('menu_product_id',$product->menu_product_id)->orderBy('updated_at','desc')->take(3)->get();
        return view('page.product-detail',
            [
                'product' => $product,
                'color' => $color,
                'size' => $size,
                'image' => $image,
                'relation'=>$relation
            ]
        );
    }

}