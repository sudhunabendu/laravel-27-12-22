<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix'=>'v1','middleware'=>['checkapiheader','cors']],function(){
    Route::post('auth/registration',[AuthController::class,'index']);
    Route::post('auth/login',[AuthController::class,'login']);


    // Products
    Route::get('products',[ProductController::class,'index']);
});
