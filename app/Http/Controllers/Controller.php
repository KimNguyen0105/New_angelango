<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App;
use Mockery\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getHome() {
        Session::put('active','home');
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $abouts = DB::table('agl_about_us')->get();
        return view('home/home',[
            'slides' => $slides,
            'abouts' => $abouts,
        ]);
    }
    public function getPageCollection() {
        Session::put('active','collection');
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $collections = DB::table('agl_collection')->get();
        return view ('page/collection',[
            'slides' => $slides,
            'collections' => $collections
        ]);
    }
    public function getPageCollectionDetail($id) {
        $slides = DB::table('agl_slide')->where('is_show',1)->orderBy('sort_order','asc')->get();
        $collections_detail = DB::table('agl_collection')->where('id',$id)->first();
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
        $news = DB::table('agl_news')->get();
        return view('page/news',[
            'news' => $news,
        ]);
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

    //    Hadesker Cart

    public function postAddToCart(Request $request)
    {
        $rowId = $request->rowId;
        $isRemove = $request->isRemove;
        $id = $request->id; $qty = $request->qty; $size = $request->size; $color=$request->color;
        try{
            $product = App\Models\AglProduct::find($id);
            if($isRemove)
                Cart::remove($rowId);
            elseif($rowId)
                Cart::update($rowId, $qty);
            else
                Cart::add(['id'=>$product->id,'name'=>$product->title_vi,'qty'=>$qty,'price'=>$product->price,'options'=>['image'=>$product->avatar,'size'=>$size,'color'=>$color]]);

            return json_encode(['status'=>1,'memo'=>"Đã cập nhật giỏ hàng thành công",'total'=>Cart::count()]);
        }
       catch (Exception $e){
           return json_encode(['status'=>0,'memo'=>"Lỗi: $e->getMessage()",'total'=>Cart::count()]);
       }
    }
    public function getPagePaycart() {
        $cart = Cart::content()->toArray();
        $provinces = App\Models\AglProvince::all();
        return view('page/paycart',compact('cart','provinces'));
    }

    public function getDistrict($province_id) {
        $districts = App\Models\AglDistrict::where('provinceid',$province_id)->get(['districtid','name','type']);
        return json_encode($districts);
    }

    public function getWard($district_id) {
        $districts = App\Models\AglWard::where('districtid',$district_id)->get(['wardid','name','type']);
        return json_encode($districts);
    }

    public function getPaymentOption() {
        $tongso = Cart::count();
        $cart = Cart::content()->toArray();
        return view('page/payment-option',compact('tongso','cart'));
    }

    public function postPaymentOption(Request $request) {
        $tongso = Cart::count();
        $cart = Cart::content()->toArray();
        $customer = $request->all();
        return view('page/payment-option',compact('tongso','cart','customer'));
    }

    public function postPaymentFinish(Request $request) {
        $result = "Đã xảy ra lỗi trong quá trình đặt hàng, vui lòng thử lại sau. Chúng tôi thành thật xin lỗi vì sự cố này";
        DB::beginTransaction();
        try {
            $order = new App\Models\AglOrder();
            $order->name = $request->lastname;
            $order->fullname = $request->lastname . ' ' . $request->firstname;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->total_price = Cart::total();
            $order->status = 1;
            $order->account_id = 0;
            $order->shipping_costs = 0;
            $order->total_item = Cart::count();
            $carts = Cart::content()->toArray();
            //dd($carts);
            if ($order->save()) {
                foreach ($carts as $cart) {
                    $order_detail = new App\Models\AglOrderDetail();
                    $order_detail->order_id = $order->id;
                    $order_detail->product_id = $cart['id'];
                    $order_detail->quantity = $cart['qty'];
                    $order_detail->price = $cart['price'];
                    $order_detail->product_size_id = App\Models\AglSizeProduct::where('size', $cart['options']['size'])->first()->id;
                    $order_detail->color = $cart['options']['color'];
                    $order_detail->save();
                }
            }
            DB::commit();
            $result = "Chúc mừng bạn đã đặt hàng thành công, chúng tôi sẽ sớm liên hệ lại với bạn để xác nhận lại đơn hàng này. Xin cảm ơn bạn. !";
        }
        catch (Exception $e)
        {
            DB::rollback();
        }
        return view('page/payment-finish',compact('result'));
    }

    public function deleteClearCart()
    {
        Cart::destroy();
    }
}
