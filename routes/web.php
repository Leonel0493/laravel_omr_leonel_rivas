<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'login-template')->name('login');
Route::view('/home', '/home/dashboard')->middleware('auth')->name('home');

Route::post('/register', [LoginController::class, 'RegisterUser'])->name('register-user');
Route::post('/login', [LoginController::class, 'Login'])->name('login-user');
Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');
