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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route for User Profile
Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('profile.user');
Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
Route::post('/passwordUpdate', [App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('profile.passwordUpdate');
Route::delete('/deleteProfile/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('profile.delete');


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


