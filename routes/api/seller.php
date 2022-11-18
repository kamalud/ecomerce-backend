<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SellerController;

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

Route::prefix('seller')->group(function(){

    Route::post('/login',[SellerController::class,'login']);
    Route::post('/register',[SellerController::class,'register']);

    Route::group(['Middleware'=>'auth:seller-api'],function(){
        Route::post('/forget', [SellerController::class , 'forget']);
        Route::post('/logout', [SellerController::class , 'logout']);
    Route::apiResources([
        // 'invoice'=> InvoiceController::class,
        // 'expense'=> ExpenseController::class,
        // 'setting'=> SettingController::class,
    ]);
});

});
