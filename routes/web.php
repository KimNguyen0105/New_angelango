<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Controller@getHome');
Route::get('/bo-suu-tap.html','Controller@getPageCollection');
Route::get('/chi-tiet-bo-suu-tap-{id}.html','Controller@getPageCollectionDetail');
Route::get('/san-pham.html','Controller@getPageProduct');
Route::get('/chi-tiet-san-pham.html','Controller@getPageProductDetail');
Route::get('/tin-tuc.html','Controller@getPageNews');
Route::get('/chi-tiet-tin-tuc.html','Controller@getPageNewsDetail');
Route::get('/gioi-thieu.html','Controller@getPageAbout');
Route::get('/lien-he.html','Controller@getPageContact');
Route::get('/gio-hang.html','Controller@getPagePaycart');
//Route::get('/thanh-toan.html','Controller@getPaymentOption');
Route::get('/dang-nhap.html','Controller@getPageLogin');
Route::get('/dang-ky.html','Controller@getPageSignup');
Route::get('/thong-tin-ca-nhan.html','Controller@getPagePersonal');
Route::get('/hop-thu.html','Controller@getPageChatbox');
Route::get('/quan-ly-hoa-don.html','Controller@getPageOrderDetail');
Route::get('/huong-dan-mua-hang.html','Controller@getPageShopGuide');


//Hadesker Cart
Route::POST('cart/add-to-cart','Controller@postAddToCart');
Route::DELETE('cart/clear-cart','Controller@deleteClearCart');

Route::GET('cart/district/{province_id}','Controller@getDistrict');
Route::GET('cart/ward/{district_id}','Controller@getWard');

Route::POST('/thanh-toan.html','Controller@postPaymentOption');
Route::POST('/dat-hang.html','Controller@postPaymentFinish');

Route::get('test',function (){
   \Gloudemans\Shoppingcart\Facades\Cart::destroy();
});


//================== Admin routes ================================
Route::get('/admin','Admin\AdminController@Home')->middleware('not.login');
Route::get('/admin/log-in','Admin\UserController@getLogin');
Route::get('/admin/log-out','Admin\UserController@Logout');
Route::post('/admin/log-in','Admin\UserController@postLogin');
Route::get('/admin/sign-up','Admin\UserController@getSignup');
Route::post('/admin/sign-up','Admin\UserController@postSignup');



//system config
Route::get('/admin/system-config','Admin\AdminController@getSystemConfig')->middleware('not.login');
Route::post('/admin/system-config','Admin\AdminController@updateSystemConfig')->middleware('not.login');

//tin tức
Route::get('/admin/news','Admin\NewsController@getNews')->middleware('not.login');
Route::get('/admin/news/create-news','Admin\NewsController@getCreateNews')->middleware('not.login');
Route::post('/admin/news/create-news','Admin\NewsController@postCreateNews')->middleware('not.login');
Route::get('/admin/news/edit-news/{id}','Admin\NewsController@getEditNews')->middleware('not.login');
Route::post('/admin/news/edit-news/{id}','Admin\NewsController@postEditNews')->middleware('not.login');
Route::get('/admin/news/delete-news/{id}','Admin\NewsController@DeleteNews')->middleware('not.login');

//collection
Route::get('/admin/collection','Admin\CollectionController@getCollection')->middleware('not.login');
Route::get('/admin/collection/create-collection','Admin\CollectionController@getCreateCollection')->middleware('not.login');
Route::post('/admin/collection/create-collection','Admin\CollectionController@postCreateCollection')->middleware('not.login');
Route::get('/admin/collection/edit-collection/{id}','Admin\CollectionController@getEditCollection')->middleware('not.login');
Route::post('/admin/collection/edit-collection/{id}','Admin\CollectionController@postEditCollection')->middleware('not.login');



//system permission
Route::get('/admin/system-permission','Admin\PermissionController@Index')->middleware('not.login');
Route::get('/admin/resize-image','Admin\PermissionController@getResize')->middleware('not.login');
Route::post('/admin/resize-image','Admin\PermissionController@postResize')->middleware('not.login');

//menu management
Route::get('/admin/{id}-menu-management','Admin\AdminController@getMenu')->middleware('not.login');
Route::get('/admin/create-new-menu','Admin\AdminController@getCreateNewMenu')->middleware('not.login');
Route::post('/admin/create-new-menu','Admin\AdminController@postCreateNewMenu')->middleware('not.login');
Route::get('/admin/delete-menu-{id}','Admin\AdminController@getDeleteMenu')->middleware('not.login');
Route::post('/admin/delete-menu-{id}','Admin\AdminController@postDeleteMenu')->middleware('not.login');
Route::get('/admin/edit-menu-{id}','Admin\AdminController@getEditMenu')->middleware('not.login');
Route::post('/admin/edit-menu-{id}','Admin\AdminController@postEditMenu')->middleware('not.login');