<?php
use  Illuminate\Auth\Middleware\AdminMiddleware;
use  Illuminate\Auth\Middleware\CustomerMiddleware;
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

// =============================== Font End =============================================//
Route::get('/', 'HomeController@index');
Route::get('/home.html', 'HomeController@index');
Route::get('/contact.html', 'HomeController@contact');
Route::get('/introduce.html', 'HomeController@introduce');
Route::get('/detail-product/{id}.html', 'ProductController@detail_product');
Route::get('/watch-man.html', 'ProductController@watch');
Route::get('/searchProduct.html', 'ProductController@searchProduct');

    

// Home

Route::post('/load-more-product','ProductController@loadMore');
Route::post('/watchAjax','ProductController@watchAjax');
Route::post('/searchAjax','ProductController@searchAjax');
//Cart Ajax
Route::group(['middleware' => ['CustomerMiddleware']], function () {
    Route::get('/show-cart-ajax.html', 'CartController@showCartAjax');
    Route::post('/add-cart-ajax','CartController@addCartAjax');
    Route::post('/delete-cart-ajax','CartController@deleteCartAjax');
    Route::post('/update-cart-ajax','CartController@UpdateCartAjax');
    Route::get('/thanh-toan.html','CartController@thanhToan');
    Route::post('/executeOrder.html','CartController@executeOrder');
    Route::get('/information-order.html','CartController@showinformationOrder');
});


// Login , Logout, register
Route::get('/login.html', 'LoginController@login');
Route::get('/register.html', 'LoginController@register');
Route::get('/logout.html', 'LoginController@logout');
Route::get('/forgotPassword.html','LoginController@forgotPassword');
Route::post('/register.html','LoginController@executedRegister');
Route::post('/login.html','LoginController@executeLogin');
Route::post('/forgotPassword.html','LoginController@executeForgotPassword');
Route::get('/OTPforgotPassword/{id}.html','LoginController@OTPexecuteForgotPassword');
Route::get('/changePass/{id}.html','LoginController@changePass');
Route::post('/changePass.html','LoginController@changePassPost');
Route::post('/confirmFotgot.html', 'LoginController@confirmFotgot');
// check mail exist
Route::post('/ajaxCheckEmailExit', 'ValidateController@ajaxCheckEmailExit');
Route::post('/ajaxCheckPasswordNotSame', 'ValidateController@ajaxCheckPasswordNotSame');
// =============================== Back-end =============================================//
// Admin 
// Route::get('/admin', 'AdminController@index')->middleware('AdminMiddleware');
Route::get('/dashboard', 'AdminController@index');
Route::get('/admin', 'AdminController@index');
// Product

Route::get('/edit-product/{id_product}', 'ProductController@edit');
Route::post('/update-product/{id_product}', 'ProductController@update');
Route::get('/all-product', 'ProductController@show_all');
Route::post('/save-product/{id_product}', 'ProductController@save');
Route::get('/delete-product/{id_product}', 'ProductController@delete');

// Brand
Route::get('/home-add-brand','BrandController@home');
Route::post('/save-brand','BrandController@save');
Route::get('/all-brand','BrandController@show_all');
Route::get('/delete-brand/{id}','BrandController@delete');
Route::get('/edit-brand/{id}','BrandController@edit');
Route::post('/update-brand/{id}','BrandController@update');
Route::get('/un-active-brand/{id}','BrandController@unactive');
Route::get('/active-brand/{id}','BrandController@active');


// Product ============================== 
Route::resource('products', 'ProductController');
Route::get('/un-active-product/{id}','ProductController@unactive');
Route::get('/active-product/{id}','ProductController@active');
Route::get('/active-highlight/{id}','ProductController@active_highlight');
Route::get('/un-active-highlight/{id}','ProductController@un_active_highlight');
// order
Route::get('/all-order','AdminOrderController@all_order');
Route::get('/info-detail/{id}','AdminOrderController@info_detail');
Route::get('/order-status/{id}','AdminOrderController@order_status');
// Comment

Route::post('/commentAjax','CommentController@addComment');

