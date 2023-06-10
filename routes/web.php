<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VisitorController;
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
    return redirect()->route('home');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/home/visitor', 'visitor')->name('home.visit');
});

Route::controller(AdminController::class)->middleware('auth')->group(function () {
    Route::get('/admin', 'index')->name('admin');
    Route::get('/admin/user', 'user')->name('user');
    Route::get('/admin/profile', 'show')->name('admin.profile');
    Route::get('/admin/profile/edit', 'edit')->name('admin.edit');
    Route::get('/admin/create', 'create')->name('user.create');
    Route::get('/admin/user/detail/{user}', 'userShow')->name('user.detail');
    Route::get('/admin/user/edit/{user}', 'userEdit')->name('user.edit');
    Route::get('/admin/user/edit-password/{user}', 'userEditPassword')->name('user.edit.password');
    Route::get('/admin/user/delete/{user}', 'destroy')->name('user.delete');
    Route::put('/admin/profile/update/{user}', 'update')->name('admin.update');
    Route::put('/admin/user/edit/{user}', 'userUpdate')->name('user.update');
    Route::put('/admin/user/edit-password/{user}', 'userUpdatePassword')->name('user.update.password');
    Route::post('/admin/create', 'store')->name('user.create');
});

Route::controller(CustomAuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'credentials')->name('credentials');
    Route::get('/login/logout', 'logout')->name('logout');
});

Route::controller(VisitorController::class)->middleware('auth')->group(function () {
    Route::get('/visit', 'index')->name('visit');
    Route::get('/visit/generate', 'generateToken')->name('visit.generate');
    Route::get('/visit/form', 'create')->name('visit.form');
    Route::post('/visit/form', 'store')->name('visit.store');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/post', 'index')->name('post');
});
