<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\AsyncController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/async', [AsyncController::class, 'index']);

Route::group(['prefix'=>'v1','middleware'=>['checkapiheader','cors']],function(){
    Route::post('auth/registration',[AuthController::class,'index']);
    Route::post('auth/login',[AuthController::class,'login']);
    Route::get('session',[AuthController::class,'session']);
});
