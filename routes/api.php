<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoftwareController;
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


Route::group(['prefix' => 'auth'], function () {
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/logout',[AuthController::class,'logout']);
//    Route::post('/refresh',[AuthController::class,'refresh']);
});

Route::group(['prefix' => 'software'], function () {
    Route::get('/index',[SoftwareController::class,'index']);
    Route::post('/update/{id}',[SoftwareController::class,'update']);
    Route::get('/show/{id}',[SoftwareController::class,'show']);
    Route::post('/create',[SoftwareController::class,'store']);
    Route::post('/delete/{id}',[SoftwareController::class,'destroy']);
});
