<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\users\login;
use App\Http\Controllers\admin\main;
use App\Http\Controllers\admin\sliderController;
use App\Http\Controllers\admin\UploadController;
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
Route::get('/admin/users/login', [login::class,'index'])->name('login');
Route::post('/admin/users/login/loging', [login::class,'loging']);



Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function(){
        //admin/main
        Route::get('/', [Main::class, 'index'])->name('admin');
        Route::get('/main',[main::class,'index'])->name('admin');
        //admin/slider
        Route::prefix('sliders')->group(function(){
            Route::get('/add',[sliderController::class,'create']);
            Route::post('/add',[sliderController::class,'addslider']);
            // Route::get('/list',[sliderController::class,'index']);
            // Route::get('edit/{slider}',[sliderController::class,'show']);
            // Route::post('edit/{slider}',[sliderController::class,'update']);
            // Route::Delete('destroy',[sliderController::class,'destroy']);
        });

        //upload

      Route::post('upload/services', [UploadController::class, 'upload']);
    });





});

