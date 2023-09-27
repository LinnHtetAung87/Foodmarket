<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\shopcontroller;
use App\Http\Controllers\ShoprequestController;


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
Route::post('login',[CustomLoginController::class,'login'])->name('login');
Route::get('showLoginForm',[CustomLoginController::class,'showLoginForm']);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('roleprocess', RoleController::class);
Route::resource('staffprocess', StaffController::class);
Route::resource('shopprocess', shopcontroller::class);
Route::resource('shoprequestprocess', ShoprequestController::class);

