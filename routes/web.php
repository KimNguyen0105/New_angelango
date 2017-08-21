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

Route::get('/', function () {
    return view('welcome');
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

//danh mục sản phẩm
Route::get('/admin/menu-product','Admin\MenuProductController@getMenuProduct')->middleware('not.login');
Route::get('/admin/menu-product/create-menu-product','Admin\MenuProductController@getCreateMenuProduct')->middleware('not.login');
Route::post('/admin/menu-product/create-menu-product','Admin\MenuProductController@postCreateMenuProduct')->middleware('not.login');
Route::get('/admin/menu-product/edit-menu-product/{id}','Admin\MenuProductController@getEditMenuProduct')->middleware('not.login');
Route::post('/admin/menu-product/edit-menu-product/{id}','Admin\MenuProductController@postEditMenuProduct')->middleware('not.login');
Route::get('/admin/menu-product/delete-menu-product/{id}','Admin\MenuProductController@DeleteMenuProduct')->middleware('not.login');

//Sản phẩm
Route::get('/admin/product','Admin\ProductController@getProduct')->middleware('not.login');
Route::get('/admin/product/create-product','Admin\ProductController@getCreateProduct')->middleware('not.login');
Route::post('/admin/product/create-product','Admin\ProductController@postCreateProduct')->middleware('not.login');
Route::get('/admin/product/edit-product/{id}','Admin\ProductController@getEditProduct')->middleware('not.login');
Route::post('/admin/product/edit-product/{id}','Admin\ProductController@postEditProduct')->middleware('not.login');
Route::get('/admin/product/delete-product/{id}','Admin\ProductController@DeleteProduct')->middleware('not.login');
Route::get('/admin/remove-img/{id_img}','Admin\ProductController@removeimg')->middleware('not.login');
Route::get('/admin/remove-color/{id_color}/{id_product}','Admin\ProductController@removecolor')->middleware('not.login');
Route::get('/admin/add-color/{id}','Admin\ProductController@addcolor')->middleware('not.login');

//Khuyến mãi
Route::get('/admin/discount','Admin\DiscountController@getDiscount')->middleware('not.login');
Route::get('/admin/discount/edit-discount/{id}','Admin\DiscountController@getEditDiscount')->middleware('not.login');
Route::post('/admin/discount/edit-discount/{id}','Admin\DiscountController@postEditDiscount')->middleware('not.login');
Route::get('/admin/discount/delete-discount/{id}','Admin\DiscountController@DeleteDiscount')->middleware('not.login');

//Đăng ký nhận ưu đãi
Route::get('/admin/subscribe','Admin\SubscribeController@getSubscribe')->middleware('not.login');
// Route::get('/admin/subscribe/edit-subscribe/{id}','Admin\SubscribeController@getEditSubscribe')->middleware('not.login');
Route::post('/admin/subscribe/edit-subscribe-doc/{id}','Admin\SubscribeController@postEditSubscribeDoc')->name('admin.doc')->middleware('not.login');
Route::post('/admin/subscribe/edit-subscribe-chua-doc/{id}','Admin\SubscribeController@postEditSubscribeChuaDoc')->name('admin.chuadoc')->middleware('not.login');
Route::get('/admin/subscribe/delete-subscribe/{id}','Admin\SubscribeController@DeleteSubscribe')->middleware('not.login');

//Banner
Route::get('/admin/banner','Admin\BannerController@getBanner')->middleware('not.login');
Route::get('/admin/banner/create-banner','Admin\NewsController@getCreateBanner')->middleware('not.login');
Route::post('/admin/banner/create-banner','Admin\BannerController@postCreateBanner')->middleware('not.login');
Route::get('/admin/banner/edit-banner/{id}','Admin\BannerController@getEditBanner')->middleware('not.login');
Route::post('/admin/banner/edit-banner/{id}','Admin\BannerController@postEditBanner')->middleware('not.login');
Route::get('/admin/banner/delete-banner/{id}','Admin\BannerController@DeleteBanner')->middleware('not.login');


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