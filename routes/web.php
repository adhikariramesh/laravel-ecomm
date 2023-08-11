<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginConroller;
use App\Http\Controllers\adminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/admin', [adminController::class, 'index']);
Route::get('/', [FrontendController::class, 'index'])->name('/')->middleware('adminGard');

Route::get('/login', [LoginConroller::class, 'index'])->name('login')->middleware('loginGard');
Route::get('/register', [LoginConroller::class, 'registerForm'])->name('register')->middleware('loginGard');
Route::post('/register', [LoginConroller::class, 'register']);
Route::post('/login', [LoginConroller::class, 'login']);
Route::get('/logout', [LoginConroller::class, 'logout']);

Route::get('/verify/{token}', [LoginConroller::class , 'verify']);

Route::get('/collactions/{id}',[FrontendController::class, 'collactions']);
Route::get('/collactions/single_product/{id}',[FrontendController::class, 'singleProduct']);
Route::post('/checkout/{id}', [FrontendController::class, 'checkout'])->name('checkout')->middleware('checkoutGard');
Route::post('/addtocart', [FrontendController::class, 'addtocart'])->name('addtocart');
Route::get('/showcart', [FrontendController::class, 'showcart']);

Route::prefix('/payment')->group( function(){
    Route::controller(PaymentController::class)->group(function(){
        Route::post('/esewa','esewa');
    });
});



Route::prefix('/admin')->group(function () {

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add/category', [CategoryController::class, 'categoryForm']);
    Route::Post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/category/update/{id}', [CategoryController::class, 'update']);



    Route::controller(BrandController::class)->group(function () {

        Route::get('/brand', 'show');
        Route::get('/add/brand', 'add');
        Route::post('/brand/store', 'store');
        Route::get('/brand/delete/{id}', 'delete');
        Route::get('/brand/edit/{id}', 'edit');
        Route::put('/brand/update/{id}', 'update');
    });

    Route::controller(ColorController::class)->group( function(){
        Route::get('/color', 'index');
        Route::get('/add/color', 'add');
        Route::post('/color/store', 'store');
        Route::get('/color/delete/{id}', 'delete');
        Route::get('/color/edit/{id}', 'edit');
        Route::put('/color/update/{id}', 'update');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('/products', 'index');
        Route::get('/add/products', 'add');
        Route::post('/products/store', 'store');
        Route::get('/product/edit/{id}', 'edit');
        Route::put('/products/update/{id}', 'update');
        Route::get('/product/delete/{id}', 'delete');
        Route::get('/product/deleteimage/{id}', 'deleteImage');
        Route::post('/product/color/update', 'updateColorQuantity')->name('update_color');
    });

    Route::controller(SliderController::class)->group(function(){
        Route::get('/sliders','index');
        Route::get('/add/sliders','add');
        Route::post('/slider/store','store');
        Route::get('/sliders/edit/{id}','edit');
        Route::put('/sliders/update/{id}','update');
        Route::get('/sliders/delete/{id}','delete');
    });


});





