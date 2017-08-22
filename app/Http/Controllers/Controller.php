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
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $abouts = DB::table('agl_about_us')->get();
        $press = DB::table('agl_style_life')->get();
        return view('home/home',[
            'slides' => $slides,
            'abouts' => $abouts,
            'press' => $press,
        ]);
    }
    public function SetLanguage($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }

    public function getPageCollection() {
        Session::put('active','home');
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        Session::put('active','collection');
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $collections = DB::table('agl_collection')->where('status',1)->get();

        return view ('page/collection',[
            'slides' => $slides,
            'collections' => $collections
        ]);
    }
    public function getPageCollectionDetail($id) {
        Session::put('active','home');
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $collections_detail = DB::table('agl_collection')->where('id',$id)->first();
        return view('page/collection-detail',[
            'slides' => $slides,
            'collections_detail' => $collections_detail,
        ]);
    }
    public function getPageProduct() {
        Session::put('active','product');
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/product');
    }
    public function getPageProductDetail() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/product-detail');
    }
    public function getPageNews() {
        Session::put('active','news');
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        $news = DB::table('agl_news')->get();
        $banner = DB::table('agl_banner')->where('type',2)->first();
        return view('page/news',[
            'news' => $news,
            'banner' => $banner,
        ]);
    }
    public function getPageNewsDetail($id) {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        $news = DB::table('agl_news')->where('id',$id)->first();
        $news_update = DB::table('agl_news')->get();
        $banner = DB::table('agl_banner')->where('type',2)->first();
        return view('page/news-detail',[
            'news' => $news,
            'news_update' => $news_update,
            'banner' => $banner
        ]);
    }
    public  function getPageAbout() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        Session::put('active','about');
        $abouts = DB::table('agl_about_us')->get();
        $about_different = DB::table('agl_about_us_different')->orderBy('sort_order','asc')->get();
        $banner = DB::table('agl_banner')->where('type',3)->first();
        return view('page/about',[
            'abouts' => $abouts,
            'about_different' => $about_different,
            'banner' => $banner
        ]);
    }
    public function getPageContact() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        Session::put('active','contact');
        return view('page/contact');
    }
    public function getPagePaycart() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/paycart');
    }
    public function getPaymentOption() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/payment-option');
    }
    public function getPageLogin() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('partial/login');
    }
    public function getPageSignup() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('partial/signup');
    }
    public  function getPagePersonal() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/persional_info');
    }
    public function getPageChatbox() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/chatbox');
    }
    public function getPageOrderDetail() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/order-detail');
    }
    public function getPageShopGuide() {
        if(Session::has('locale')){
            App::setLocale(Session::get('locale'));
        } else {
            Session::put('locale','vi');
        }
        return view('page/shopguide');
    }
}
