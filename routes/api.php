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
Route::post('/logout', [App\Http\Controllers\UserApiController::class,'logout']);


//List api


Route::get('/brandlist', [App\Http\Controllers\ApiController::class,'brandList'])->name('brandlist');
Route::get('/orderlist', [App\Http\Controllers\ApiController::class,'orderList'])->name('orderlist');
Route::post('/placeorder', [App\Http\Controllers\ApiController::class,'placeOrder'])->name('placeorder');



Route::post('/food_drink', [App\Http\Controllers\ApiController::class,'foodDrink'])->name('food_drink');
Route::post('/store_list', [App\Http\Controllers\ApiController::class,'storeList'])->name('store_list');
Route::get('/aboutus', [App\Http\Controllers\ApiController::class,'aboutUs'])->name('aboutus');
Route::get('/dashboard', [App\Http\Controllers\ApiController::class,'dashboard'])->name('dashboard');
Route::get('/offerlist', [App\Http\Controllers\ApiController::class,'offerList'])->name('offerlist');
Route::get('/categorylist', [App\Http\Controllers\ApiController::class,'getCategoryList'])->name('categorylist');
Route::post('/subcategorylist/', [App\Http\Controllers\ApiController::class,'subCategory'])->name('subcategorylist');
Route::get('/vehicle_list/', [App\Http\Controllers\ApiController::class,'vehiclList'])->name('vehicle_list');
Route::post('/productlist', [App\Http\Controllers\ApiController::class,'productListByCategory'])->name('productlist');
Route::post('/pickup_dropoff', [App\Http\Controllers\ApiController::class,'pickUpDropOff'])->name('pickup_dropoff');
Route::post('/write_to_us', [App\Http\Controllers\ApiController::class,'writeToUs'])->name('write_to_us');
Route::post('/pick_drop_amount', [App\Http\Controllers\ApiController::class,'PickDropAmount'])->name('pick_drop_amount');
Route::get('/get_amount', [App\Http\Controllers\ApiController::class,'get_amount']);

