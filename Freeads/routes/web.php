<?php

use Illuminate\Support\Facades\Route;
use App\Models\Adds;

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
/*
Route::get('/index', function () {
    return view('adds.index');
});
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/index', 'App\Http\Controllers\DescController@index');
Route::get('/about', 'App\Http\Controllers\DescController@about');
Route::get('/contact', 'App\Http\Controllers\DescController@contact');

//Route::resource('/posts', 'App\Http\Controllers\PostsController');
//Route::resource('/index', 'App\Http\Controllers\AddsController');
//Route::get('/create', 'App\Http\Controllers\AddsController@create');
  Route::resource('/adds', 'App\Http\Controllers\AddsController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
