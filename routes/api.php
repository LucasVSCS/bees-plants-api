<?php

use App\Http\Controllers\Api\BeeController;
use App\Http\Controllers\Api\PlantController;
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

Route::group(['namespace' => 'Api',
], function () {
    // Bees routes
    Route::get('bees', [BeeController::class, 'index']);
    Route::post('create-bee', [BeeController::class, 'store']);

    // Plants routes
    Route::post('search-plants', [PlantController::class, 'find']);
    Route::post('create-plant', [PlantController::class, 'store']);
});
