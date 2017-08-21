<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getHome() {
        Session::put('active','home');
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $abouts = DB::table('agl_about_us')->get();
//        dd($abouts);
        return view('home/home',[
            'slides' => $slides,
            'abouts' => $abouts,
        ]);
    }
    public function getPageCollection() {
        Session::put('active','collection');
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $collections = DB::table('agl_collection')->get();
//        dd($collections);
        return view ('page/collection',[
            'slides' => $slides,
            'collections' => $collections
        ]);
    }
    public function getPageCollectionDetail($id) {
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
//        dd($slides);
        $collections_detail = DB::table('agl_collection')->where('id',$id)->first();
//        dd($collections_detail);
        return view('page/collection-detail',[
            'slides' => $slides,
            'collections_detail' => $collections_detail,
        ]);
    }
    public function getPageProduct() {
        Session::put('active','product');
        return view('page/product');
    }
    public function getPageProductDetail() {
        return view('page/product-detail');
    }
    public function getPageNews() {
        Session::put('active','news');
        return view('page/news');
    }
    public function getPageNewsDetail() {
        return view('page/news-detail');
    }
    public  function getPageAbout() {
        Session::put('active','about');
        $abouts = DB::table('agl_about_us')->get();
        return view('page/about',[
            'abouts' => $abouts
        ]);
    }
    public function getPageContact() {
        Session::put('active','contact');
        return view('page/contact');
    }
    public function getPagePaycart() {
        return view('page/paycart');
    }
    public function getPaymentOption() {
        return view('page/payment-option');
    }
    public function getPageLogin() {
        return view('partial/login');
    }
    public function getPageSignup() {
        return view('partial/signup');
    }
    public  function getPagePersonal() {
        return view('page/persional_info');
    }
    public function getPageChatbox() {
        return view('page/chatbox');
    }
    public function getPageOrderDetail() {
        return view('page/order-detail');
    }
    public function getPageShopGuide() {
        return view('page/shopguide');
    }
}
