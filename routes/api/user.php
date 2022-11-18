<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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


Route::prefix('user')->group(function(){

    Route::post('/login',[UserController::class,'login']);
    Route::post('/register',[UserController::class,'register']);

    Route::group(['Middleware'=>'auth:user-api'],function(){
        Route::post('/forget', [UserController::class , 'forget']);
        Route::post('/logout', [UserController::class , 'logout']);
    Route::apiResources([
        // 'invoice'=> InvoiceController::class,
        // 'expense'=> ExpenseController::class,
        // 'setting'=> SettingController::class,
    ]);
});

});
