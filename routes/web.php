<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ShoppingController;
use App\Http\Middleware\NoLogin;  


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda dapat mendaftarkan rute web untuk aplikasi Anda. Ini
| rute dimuat oleh RouteServiceProvider dalam grup yang
| berisi grup middleware "web". Sekarang buat sesuatu yang hebat!
|
*/

//materi catalog
Route::get('/',[HomeController::class,'index']);
Route::get('/catalog',[CatalogController::class,'index']);
Route::get('/shopping-niko',[ShoppingController::class,'index']);
Route::post('/shopping-niko',[ShoppingController::class,'proses']);

Route::middleware([NoLogin::class]) ->group(function(){

    //tugas form login
    Route::get('login',[AuthController::class,'login']);
    Route::post('login',[AuthController::class,'login_process']);
    Route::get('register',[AuthController::class,'register']);
    Route::post('register',[AuthController::class,'register_process']);

});

Route::middleware(['auth'])->group(function(){

    //lanjutan materi catalog
    Route::get('logout',[AuthController::class,'logout']);
    Route::get('category',[CategoryController::class,'index']);


    //tugas kuis 2
    Route::get('categoryform',[CategoryController::class,'categoryform']);
    Route::post('categoryform',[CategoryController::class,'categoryform_proses']);


    //lanjutan materi catalog
    Route::get('category-delete/{id}',[CategoryController::class,'del_process'])->name('delctgr');
    Route::get('category-edit/{id}',[CategoryController::class,'edit']);
    Route::post('category-edit/{id}',[CategoryController::class,'edit_process']);
    Route::get('product',[ProductController::class,'index']);
    Route::get('product-add',[ProductController::class,'add']);
    Route::post('product-add',[ProductController::class,'add_process']);

    //tugas hapus product
    Route::get('product-delete/{id}',[ProductController::class,'del_process'])->name('delprdt');


    //lanjutan materi catalog
    Route::get('product-edit/{id}',[ProductController::class,'edit']);
    Route::post('product-edit/{id}',[ProductController::class,'edit_process']);
    Route::get('profile',[AuthController::class,'profile']);
    Route::post('profile',[AuthController::class,'profile_process']);
});