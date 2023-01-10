<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group(['namespace' => 'Auth'], function(){
    Route::get('registration', [App\Http\Controllers\Auth\RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('registration', [App\Http\Controllers\Auth\RegisterController::class, 'postRegister'])->name('post.register');

    Route::get('verify-account', [App\Http\Controllers\Auth\RegisterController::class, 'verifyAccount'])->name('user.verify.account');

    Route::get('log-in', [App\Http\Controllers\Auth\LoginController::class, 'getLogin'])->name('get.login');
    Route::post('log-in', [App\Http\Controllers\Auth\LoginController::class, 'postLogin'])->name('post.login');

    Route::get('log-out', [App\Http\Controllers\Auth\LoginController::class, 'getLogout'])->name('get.logout.user');

    Route::get('/password-retrieval', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getFormResetPassword'])->name('get.reset.password');
    Route::post('/password-retrieval', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendCodeResetPassword']);
    Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('get.link.reset.password');
    Route::post('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'saveResetPassword']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('brand/{slug}-{id}', [App\Http\Controllers\CategoryController::class, 'getListProduct'])->name('get.list.product');
Route::get('products', [App\Http\Controllers\CategoryController::class, 'getListProduct'])->name('get.product.list');

Route::get('allProduct', [App\Http\Controllers\CategoryController::class, 'getAllProduct'])->name('get.product.all');

Route::get('products/{slug}-{id}', [App\Http\Controllers\ProductDetailController::class, 'productDetail'])->name('get.detail.product');

//bai viet
Route::get('posts', [App\Http\Controllers\ArticleController::class, 'getListArticle'])->name('get.list.article');
Route::get('posts/{slug}-{id}', [App\Http\Controllers\ArticleController::class, 'getDetailArticle'])->name('get.detail.article');

Route::prefix('shopping')->group(function(){
    Route::get('/add/{id}',[App\Http\Controllers\ShoppingCartController::class, 'addProduct'])->name('add.shopping.cart');
    Route::get('/delete/{id}',[App\Http\Controllers\ShoppingCartController::class, 'deleteProductItem'])->name('delete.shopping.cart');
    Route::get('/listCart',[App\Http\Controllers\ShoppingCartController::class, 'getListShoppingCart'])->name('get.list.shopping.cart');
    Route::get('/deleteAll',[App\Http\Controllers\ShoppingCartController::class, 'destroyProduct'])->name('destroy.shopping.cart');
    Route::get('/update/increaseQty-{rowID}',[App\Http\Controllers\ShoppingCartController::class, 'increaseQty'])->name('increaseQty.shopping.cart');
    Route::get('/update/decreaseQty-{rowID}',[App\Http\Controllers\ShoppingCartController::class, 'decreaseQty'])->name('decreaseQty.shopping.cart');
});

Route::group(['prefix' => 'cart', 'middleware' => 'CheckLoginUser'],function(){
    Route::get('/payment',[App\Http\Controllers\ShoppingCartController::class, 'getFormPay'])->name('get.form.pay');
    Route::post('/payment',[App\Http\Controllers\ShoppingCartController::class, 'saveInfoShoppingCart']);
});

Route::prefix('contact')->group(function(){
    Route::get('/contactform', [App\Http\Controllers\ContactController::class, 'getContact'])->name('get.contact');
    Route::post('/contactform', [App\Http\Controllers\ContactController::class, 'saveContact']);
});

Route::group(['prefix' => 'ajax', 'middleware' => 'CheckLoginUser'],function(){
    Route::post('/reviews/{id}',[App\Http\Controllers\RatingController::class, 'saveRating'])->name('post.rating.product');
});

Route::get('home/{slug}', [App\Http\Controllers\PageStaticController::class, 'getPage'])->name('get.page_static');
// Route::get('delivery-information', [App\Http\Controllers\PageStaticController::class, 'delInfor'])->name('get.delivery_information');
// Route::get('privacy-policy', [App\Http\Controllers\PageStaticController::class, 'security'])->name('get.sercutity');
// Route::get('term-and-condition', [App\Http\Controllers\PageStaticController::class, 'rules'])->name('get.term_rules');

Route::prefix('')->middleware('CheckLoginUser')->group(function() {

    Route::group(['prefix' => 'user'],function(){
        Route::get('/user-overview',[App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');
        Route::get('/order-detail/{id}', [App\Http\Controllers\UserController::class, 'viewOrder'])->name('get.view.order');

        Route::get('/information',[App\Http\Controllers\UserController::class, 'updateInfo'])->name('user.update.info');
        Route::post('/information',[App\Http\Controllers\UserController::class, 'saveUpdateInfo']);

        Route::get('/password',[App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.update.password');
        Route::post('/password',[App\Http\Controllers\UserController::class, 'saveUpdatePassword']);

        Route::get('/selling-products',[App\Http\Controllers\UserController::class, 'getProductPay'])->name('user.product');
    });
});
Route::group(['prefix' => 'ajax'],function(){
    Route::post('/view-product',[App\Http\Controllers\HomeController::class, 'renderProductView'])->name('post.product.view');
});
