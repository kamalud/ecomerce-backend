<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\Admin\SliderController;

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

Route::prefix('admin')->group(function(){

    Route::post('/login',[AdminController::class,'login']);
    Route::post('/register',[AdminController::class,'register']);

    Route::group(['Middleware'=>'auth:admin-api'],function(){
        Route::post('/forget', [AdminController::class , 'forget']);
        Route::post('/logout', [AdminController::class , 'logout']);
    Route::apiResources([
        'slider'=> SliderController::class,
        // 'invoice'=> InvoiceController::class,
        // 'expense'=> ExpenseController::class,
        // 'setting'=> SettingController::class,
    ]);
});

});
