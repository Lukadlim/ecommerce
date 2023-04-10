<?php

use App\Http\Controllers\HomeController;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('/product/{product:slug}', [HomeController::class, 'details'])->name('site.details');

Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products')->middleware('auth');
Route::get('/admin/product/add', [AdminController::class, 'indexAdd'])->name('admin.product.add')->middleware('auth');
Route::post('/admin/product/store', [AdminController::class, 'store'])->name('admin.product.store');
Route::delete('/admin/product/{id}', [AdminController::class, 'destroy'])->name('admin.product.destroy');

Route::get('/admin/product/{id}/edit', [AdminController::class, 'edit'])->name('admin.product.edit')->middleware('auth');
Route::put('/admin/product/{product}/update', [AdminController::class, 'update'])->name('admin.product.update');

Route::get('/admin/product/{id}/delete-image', [AdminController::class, 'destroyImage'])->name('admin.product.destroyImage');

Route::view('/user/login', 'user.login')->name('user.login');
Route::view('/user/register', 'user.create')->name('user.register');
Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::post('user/auth', [UserController::class, 'auth'])->name('user.auth');

Route::view('/site/cart', 'site.cart')->name('site.cart');