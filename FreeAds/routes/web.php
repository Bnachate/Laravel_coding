<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Adds;
use App\Models\AdminUser;
use App\Models\AdminAdds;
use App\Models\User;

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


Route::get('/index', 'App\Http\Controllers\DescController@index');
Route::get('/about', 'App\Http\Controllers\DescController@about');
Route::get('/contact', 'App\Http\Controllers\DescController@contact');

//Route::resource('/posts', 'App\Http\Controllers\PostsController');
//Route::resource('/index', 'App\Http\Controllers\AddsController');
//Route::get('/create', 'App\Http\Controllers\AddsController@create');
Route::resource('/adds', 'App\Http\Controllers\AddsController');


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route for User Profile
Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('profile.user');
Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::post('/passwordUpdate', [App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('profile.passwordUpdate');
Route::delete('/deleteProfile/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('profile.delete');

// Route for Admin dashboard

// Route for Admin User
Route::get('/admin/users', [App\Http\Controllers\Admin\AdminUserController::class, 'index'])
->middleware('is_admin')
->name('admin.users.index')
;
Route::post('/admin/users', [App\Http\Controllers\Admin\AdminUserController::class, 'store'])->middleware('is_admin')->name('admin.users.index');
Route::get('/admin/users/create', [App\Http\Controllers\Admin\AdminUserController::class, 'create'])->middleware('is_admin')->name('admin.users.create');
Route::get('/admin/users/edit/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'edit'])->middleware('is_admin')->name('admin.users.edit');
Route::post('/admin/users/update/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'update'])->middleware('is_admin')->name('admin.users.update');
Route::delete('/admin/users/delete/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy'])->middleware('is_admin')->name('admin.users.delete');

// Route for Admin Adds

Route::get('/admin/adds', [App\Http\Controllers\Admin\AdminAddsController::class, 'index'])->middleware('is_admin')->name('admin.adds.index');
Route::post('/admin/adds', [App\Http\Controllers\Admin\AdminAddsController::class, 'store'])->middleware('is_admin')->name('admin.adds.index');
Route::get('/admin/adds/create', [App\Http\Controllers\Admin\AdminAddsController::class, 'create'])->middleware('is_admin')->name('admin.adds.create');
Route::get('/admin/adds/edit/{id}', [App\Http\Controllers\Admin\AdminAddsController::class, 'edit'])->middleware('is_admin')->name('admin.adds.edit');
Route::post('/admin/adds/update/{id}', [App\Http\Controllers\Admin\AdminAddsController::class, 'update'])->middleware('is_admin')->name('admin.adds.update');
Route::delete('/admin/adds/delete/{id}', [App\Http\Controllers\Admin\AdminAddsController::class, 'destroy'])->middleware('is_admin')->name('admin.adds.delete');

