<?php

use App\Http\Controllers\Administrator\HomeController;
use App\Http\Controllers\Administrator\ImageUploadProgressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\RegistrationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[HomeController::class,'index'])->name('home');


Route::get('/mail',[RegistrationController::class,'index'])->name('mail');
Route::get('/send',[RegistrationController::class,'sendMail'])->name('send');


Route::get('/image',[ImageUploadProgressController::class,'index'])->name('image');
Route::post('/image_store',[ImageUploadProgressController::class,'imageStore'])->name('image.store');


Route::get('multiple-file-upload-progress-bar', [ImageUploadProgressController::class,'multiUpload']);
Route::post('multiple-file-upload', [ImageUploadProgressController::class,'storeMultiUpload']);


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
