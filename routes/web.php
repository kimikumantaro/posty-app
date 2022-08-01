<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/register', [RegisterController::class, 'index'])->name('register'); // chaining the name method to register
Route::post('/register', [RegisterController::class, 'store']); // post method for register button, name will inherit from top

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');
