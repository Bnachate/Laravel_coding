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
/*
Route::get('/index', function () {
    return view('adds.index');
});
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::get('/index', 'App\Http\Controllers\DescController@index');
Route::get('/about', 'App\Http\Controllers\DescController@about');
Route::get('/contact', 'App\Http\Controllers\DescController@contact');

Route::resource('/index', 'App\Http\Controllers\AddsController');