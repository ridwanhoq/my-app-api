<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('tasks', TaskController::class);
// });

// Route::post('login', [AuthController::class, 'login']);
// Route::post('register', [AuthController::class, 'register']);

Route::group(['prefix'=>'v1'], function(){

    
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function(){
        Route::resource('tasks', TaskController::class);
    });
});
