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

Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products');
Route::get('/admin/product/add', [AdminController::class, 'indexAdd'])->name('admin.product.add');
Route::post('/admin/product/store', [AdminController::class, 'store'])->name('admin.product.store');
Route::delete('/admin/product/{id}', [AdminController::class, 'destroy'])->name('admin.product.destroy');

Route::get('/admin/product/{id}/edit', [AdminController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/product/{product}/update', [AdminController::class, 'update'])->name('admin.product.update');

Route::get('/admin/product/{id}/delete-image', [AdminController::class, 'destroyImage'])->name('admin.product.destroyImage');

Route::get('/user/login', [UserController::class, 'index'])->name('user.create');