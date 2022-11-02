<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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
    return view('dashboard');
})->name('dashboard');

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

