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
Route::get('/login', [App\Http\Controllers\UserApiController::class,'login'])->name('login');
Route::middleware('auth:api')->get('/category_list',  [App\Http\Controllers\UserApiController::class,'categoryList']
);