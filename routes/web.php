<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout'); // post method for register button, name will inherit from top

Route::get('/login', [LoginController::class, 'index'])->name('login'); // chaining the name method to register
Route::post('/login', [LoginController::class, 'store']); // post method for register button, name will inherit from top

Route::get('/register', [RegisterController::class, 'index'])->name('register'); // chaining the name method to register
Route::post('/register', [RegisterController::class, 'store']); // post method for register button, name will inherit from top

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');
