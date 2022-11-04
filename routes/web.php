<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\backend\AdminProductController;
use App\Http\Controllers\backend\AdminSliderController;
use App\Http\Controllers\backend\AdminAboutUsController;
use App\Http\Controllers\backend\AdminAboutProductController;
use App\Http\Controllers\backend\AdminFeedbackController;

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

//Admin
Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('backend.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');

Route::prefix('product_and_combo')->group(function(){
    Route::get('/view',[AdminProductController::class, 'view'])->name('manage-product-and-combo');
    Route::get('/create',[AdminProductController::class, 'create'])->name('create-product-and-combo');
    Route::post('/store',[AdminProductController::class, 'store'])->name('store-product-and-combo');
    Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit-product-and-combo');
    Route::post('/update', [AdminProductController::class, 'update'])->name('update-product-and-combo');
    Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('delete-product-and-combo'); 
});

Route::prefix('slider')->group(function(){
    Route::get('/view',[AdminSliderController::class, 'view'])->name('manage-slider');
    Route::get('/create',[AdminSliderController::class, 'create'])->name('create-slider');
    Route::post('/store',[AdminSliderController::class, 'store'])->name('store-slider');
    Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('edit-slider');
    Route::post('/update', [AdminSliderController::class, 'update'])->name('update-slider');
    Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('delete-slider'); 
});

Route::prefix('about_us')->group(function(){
    Route::get('/view',[AdminAboutUsController::class, 'view'])->name('manage-about-us');
    Route::get('/create',[AdminAboutUsController::class, 'create'])->name('create-about-us');
    Route::post('/store',[AdminAboutUsController::class, 'store'])->name('store-about-us');
    Route::get('/edit/{id}', [AdminAboutUsController::class, 'edit'])->name('edit-about-us');
    Route::post('/update', [AdminAboutUsController::class, 'update'])->name('update-about-us');
    Route::get('/delete/{id}', [AdminAboutUsController::class, 'delete'])->name('delete-about-us'); 
});

Route::prefix('about_Product')->group(function(){
    Route::get('/view',[AdminAboutProductController::class, 'view'])->name('manage-about-product');
    Route::get('/create',[AdminAboutProductController::class, 'create'])->name('create-about-product');
    Route::post('/store',[AdminAboutProductController::class, 'store'])->name('store-about-product');
    Route::get('/edit/{id}', [AdminAboutProductController::class, 'edit'])->name('edit-about-product');
    Route::post('/update', [AdminAboutProductController::class, 'update'])->name('update-about-product');
    Route::get('/delete/{id}', [AdminAboutProductController::class, 'delete'])->name('delete-about-product'); 
});

Route::prefix('feedback')->group(function(){
    Route::get('/view',[AdminFeedbackController::class, 'view'])->name('manage-feedback');
    Route::get('/edit/{id}', [AdminFeedbackController::class, 'edit'])->name('edit-feedback');
    Route::post('/update', [AdminFeedbackController::class, 'update'])->name('update-feedback');
    Route::get('/delete/{id}', [AdminFeedbackController::class, 'delete'])->name('delete-feedback'); 
});



//User
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get("/",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartlist']);
Route::get('/cart/delete/{id}', [ProductController::class, 'cartDelete']); 


Route::get('checkout', [ProductController::class, 'checkout']); 
Route::post("checkout-detail",[ProductController::class,'checkoutDetail']);


Route::post("payment",[ProductController::class,'payment']);
Route::get('payment/status', [ProductController::class, 'paymentStatus'])->name('payment-status'); 
Route::post('user/payment/callback', [ProductController::class, 'callBack'])->name('payment-callback'); 

Route::get('orders', [ProductController::class, 'orderHistory']); 

Route::get('feedback', [ProductController::class, 'feedback']);

