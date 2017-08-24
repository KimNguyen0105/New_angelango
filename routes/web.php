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
Route::get('language/{locale}','Controller@SetLanguage');
Route::get('/bo-suu-tap.html','Controller@getPageCollection');
Route::get('/chi-tiet-bo-suu-tap-{id}.html','Controller@getPageCollectionDetail');
Route::get('/san-pham.html','ProductController@Index');
Route::get('/san-pham/{id}-{slug}.html','ProductController@Detail');
Route::get('/tin-tuc.html','Controller@getPageNews');
Route::get('/chi-tiet-tin-tuc-{id}.html','Controller@getPageNewsDetail');
Route::get('/gioi-thieu.html','Controller@getPageAbout');
Route::get('/lien-he.html','Controller@getPageContact');
Route::get('/gio-hang.html','Controller@getPagePaycart');
Route::get('/thanh-toan.html','Controller@getPaymentOption');
Route::get('/dang-nhap.html','Controller@getPageLogin');
Route::get('/dang-ky.html','Controller@getPageSignup');
Route::get('/thong-tin-ca-nhan.html','Controller@getPagePersonal');
Route::get('/hop-thu.html','Controller@getPageChatbox');
Route::get('/quan-ly-hoa-don.html','Controller@getPageOrderDetail');
Route::get('/huong-dan-mua-hang.html','Controller@getPageShopGuide');




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
Route::get('/admin/collection/delete-collection/{id}','Admin\CollectionController@DeleteCollection')->middleware('not.login');
//config system
Route::get('/admin/config','Admin\AdminController@getConfig')->middleware('not.login');
Route::post('/admin/config','Admin\AdminController@postConfig')->middleware('not.login');
//HỎi đáp
Route::get('/admin/qa','Admin\QAController@getQA')->middleware('not.login');
Route::get('/admin/qa/{id}','Admin\QAController@DeleteQA')->middleware('not.login');
//yêu cầu thiết kế lại
Route::get('/admin/request','Admin\QAController@getRequest')->middleware('not.login');
Route::get('/admin/request/{id}','Admin\QAController@getRequestByID')->middleware('not.login');
Route::post('/admin/request/create-request/{id}','Admin\QAController@PostRequestByID')->middleware('not.login');
Route::get('/admin/request/delete-request/{id}','Admin\QAController@DeleteRequest')->middleware('not.login');

//trạng thái đơn hàng
Route::get('/admin/status','Admin\OrderController@getStatusOrder')->middleware('not.login');
Route::post('/admin/status','Admin\OrderController@postStatusOrder')->middleware('not.login');
Route::get('/admin/status/delete-status/{id}','Admin\OrderController@DeleteStatusOrder')->middleware('not.login');
//đơn hàng
Route::get('/admin/order','Admin\OrderController@getOrder')->middleware('not.login');
Route::get('/admin/order/{id}','Admin\OrderController@getOrderByID')->middleware('not.login');
Route::post('/admin/order/update-status-order/{id}','Admin\OrderController@postOrderStatus')->middleware('not.login');
Route::get('/admin/order/delete-order/{id}','Admin\OrderController@DeleteOrder')->middleware('not.login');
//liên hệ
Route::get('/admin/contact','Admin\ContactController@getContact')->middleware('not.login');
Route::get('/admin/contact/{id}','Admin\ContactController@getContactByID')->middleware('not.login');
Route::post('/admin/contact/{id}','Admin\ContactController@postContact')->middleware('not.login');
Route::get('/admin/contact/delete-contact/{id}','Admin\ContactController@DeleteContact')->middleware('not.login');
//giới thiệu
Route::get('/admin/about-us','Admin\AboutUsController@getAboutUs')->middleware('not.login');
Route::get('/admin/about-us/{id}','Admin\AboutUsController@getAboutUsByID')->middleware('not.login');
Route::post('/admin/about-us/{id}','Admin\AboutUsController@postAboutUsByID')->middleware('not.login');
Route::get('/admin/about-us/delete-images/{id}','Admin\AboutUsController@DeleteAboutUsImage')->middleware('not.login');

Route::get('/admin/about-us-different','Admin\AboutUsController@getAboutUsDifferent')->middleware('not.login');
Route::get('/admin/about-us-different/{id}','Admin\AboutUsController@getAboutUsByIDDifferent')->middleware('not.login');
Route::post('/admin/about-us-different/{id}','Admin\AboutUsController@postAboutUsByIDDifferent')->middleware('not.login');
//trang chủ
Route::get('/admin/slide','Admin\AdminController@getSlide')->middleware('not.login');
Route::get('/admin/slide/{id}','Admin\AdminController@getSlideByID')->middleware('not.login');
Route::post('/admin/slide/{id}','Admin\AdminController@postSlide')->middleware('not.login');
Route::get('/admin/slide/delete-slide/{id}','Admin\AdminController@DeleteSlide')->middleware('not.login');

Route::get('/admin/style-life','Admin\AdminController@getStyleLife')->middleware('not.login');
Route::get('/admin/style-life/{id}','Admin\AdminController@getStyleLifeByID')->middleware('not.login');
Route::post('/admin/style-life/{id}','Admin\AdminController@postStyleLife')->middleware('not.login');
Route::get('/admin/style-life/delete-style-life/{id}','Admin\AdminController@DeleteStyleLife')->middleware('not.login');

Route::get('/admin/shop-news','Admin\AdminController@getShopNews')->middleware('not.login');
Route::get('/admin/shop-news/{id}','Admin\AdminController@getShopNewsByID')->middleware('not.login');
Route::post('/admin/shop-news/{id}','Admin\AdminController@postShopNews')->middleware('not.login');

Route::get('/admin/menu','Admin\AdminController@getMenu')->middleware('not.login');
Route::post('/admin/menu','Admin\AdminController@postMenu')->middleware('not.login');

//user
Route::get('/admin/user','Admin\UserController@getUser')->middleware('not.login');
Route::get('/admin/user/{id}','Admin\UserController@getUserByID')->middleware('not.login');
Route::post('/admin/user/{id}','Admin\UserController@postUser')->middleware('not.login');
Route::post('/admin/user/delete/{id}','Admin\UserController@DeleteUser')->middleware('not.login');
Route::get('/admin/profile/{id}','Admin\UserController@Profile')->middleware('not.login');
Route::post('/admin/profile/{id}','Admin\UserController@postProfile')->middleware('not.login');


//hướng dẫn
Route::get('/admin/guide','Admin\GuideController@getGuide')->middleware('not.login');
Route::get('/admin/guide/{id}','Admin\GuideController@getGuideByID')->middleware('not.login');
Route::post('/admin/guide/{id}','Admin\GuideController@postGuide')->middleware('not.login');
Route::get('/admin/guide/delete-guide/{id}','Admin\GuideController@DeleteGuide')->middleware('not.login');

//system permission
Route::get('/admin/permission','Admin\PermissionController@Index')->middleware('not.login');
Route::get('/admin/permission/{id}','Admin\PermissionController@getPermission')->middleware('not.login');
Route::post('/admin/permission/{id}','Admin\PermissionController@postPermission')->middleware('not.login');

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
Route::get('/admin/discount/het-han-khuyen-mai','Admin\DiscountController@hethan')->middleware('not.login');
Route::get('/admin/discount/con-han-khuyen-mai','Admin\DiscountController@conhan')->middleware('not.login');

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

//account
Route::get('/admin/account','Admin\AccountController@getAccount')->middleware('not.login');
Route::get('/admin/account/create-account','Admin\AccountController@getCreateAccount')->middleware('not.login');
Route::post('/admin/account/create-account','Admin\AccountController@postCreateAccount')->middleware('not.login');
Route::get('/admin/account/edit-account/{id}','Admin\AccountController@getEditAccount')->middleware('not.login');
Route::post('/admin/account/edit-account/{id}','Admin\AccountController@postEditAccount')->middleware('not.login');
Route::get('/admin/account/delete-account/{id}','Admin\AccountController@DeleteAccount')->middleware('not.login');

//Thống kê
Route::get('/admin/statistic/able','Admin\StatisticController@getProductAble')->middleware('not.login');
Route::get('/admin/statistic/sellers','Admin\StatisticController@Sellers')->middleware('not.login');
Route::post('/admin/statistic/sellers/form-to','Admin\StatisticController@SellersFromTo')->middleware('not.login');
Route::get('/admin/statistic/account','Admin\StatisticController@Account')->middleware('not.login');
Route::get('/admin/statistic/account/{id}','Admin\StatisticController@OrderAccount')->middleware('not.login');
Route::get('/admin/statistic/revenue','Admin\StatisticController@Revenue')->middleware('not.login');
Route::post('/admin/statistic/revenue/month','Admin\StatisticController@RevenueMonth')->middleware('not.login');