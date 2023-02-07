<?php

use Illuminate\Support\Facades\Route;

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
Route::view('register','auth.register')->middleware('guest');
Route::post('store',[\App\Http\Controllers\Auth\Register1Controller::class,'store']);
Route::view('home','home')->middleware('auth');

Route::view('login','auth.login')->middleware('guest')->name('login');
Route::post('authenticate',[\App\Http\Controllers\Auth\LoginController::class,'authenticate']);
Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logout']);
Route::get('forgot-password',[\App\Http\Controllers\Auth\ForgotPasswordController::class,'showForgotPasswordForm'])->name('forgot.password.get');
Route::post('forgot-password',[\App\Http\Controllers\Auth\ForgotPasswordController::class,'submitForgotPasswordForm'])->name('forgot.password.post');
Route::get('reset/{email}{remember_token}',[\App\Http\Controllers\Auth\ForgotPasswordController::class,'showResetPasswordForm'])->name('reset');
Route::post('reset',[\App\Http\Controllers\Auth\ForgotPasswordController::class,'submitPasswordResetForm'])->name('resetpwd');
Route::post('/reset-password',[\App\Http\Controllers\Auth\ForgotPasswordController::class,'resetPassword'])->name('auth.forgotPasswordLink');

