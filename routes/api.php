<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/registration', [App\Http\Controllers\UserApiController::class,'register']);
Route::post('/login', [App\Http\Controllers\UserApiController::class,'login']);


//List api

Route::get('/categorylist', [App\Http\Controllers\ApiController::class,'getCategoryList'])->name('categorylist');
//Route::get('/subcategorylist/{id}', [App\Http\Controllers\ApiController::class,'subCategory'])->name('subcategorylist');
Route::get('/brandlist', [App\Http\Controllers\ApiController::class,'brandList'])->name('brandlist');
Route::get('/orderlist', [App\Http\Controllers\ApiController::class,'orderList'])->name('orderlist');
Route::post('/placeorder', [App\Http\Controllers\ApiController::class,'placeOrder'])->name('placeorder');
Route::get('/productlist', [App\Http\Controllers\ApiController::class,'productList'])->name('productlist');
Route::get('/offerlist', [App\Http\Controllers\ApiController::class,'offerList'])->name('offerlist');