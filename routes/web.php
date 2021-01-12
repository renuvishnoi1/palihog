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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource('/sub_categories', App\Http\Controllers\SubCategoryController::class);
Route::resource('/categories', App\Http\Controllers\CategoryController::class);
Route::resource('/users', App\Http\Controllers\UserManagementController::class);
Route::resource('/brands', App\Http\Controllers\BrandController::class);
Route::resource('/shops', App\Http\Controllers\ShopController::class);
Route::resource('/offers', App\Http\Controllers\OfferController::class);
Route::resource('/banners', App\Http\Controllers\BannerController::class);
Route::resource('/products', App\Http\Controllers\ProductController::class);
Route::resource('/privacy', App\Http\Controllers\PrivacyPolicyController::class);
Route::resource('/aboutus', App\Http\Controllers\AboutUsController::class);