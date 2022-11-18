<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SliderController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\SubCategoryController;
use App\Http\Controllers\Frontend\BrandController;
use App\Http\Controllers\Frontend\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function(){
    Route::get('/slider', [SliderController::class , 'index']);
    Route::get('/category', [CategoryController::class , 'index']);
    Route::get('/subcategory', [SubCategoryController::class , 'index']);
    Route::get('/brand', [BrandController::class , 'index']);
    Route::get('/product', [ProductController::class , 'index']);
    
});





