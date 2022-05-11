<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontController;
use App\Http\Controllers\Back\OpenTimeController;
use App\Http\Controllers\Back\TeacherReserveContorller;

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


// Route::prefix('auth')->group(function () {
//     Route::get('/', [AuthController::class,'me']);
//     Route::post('login', [AuthController::class,'login'])->name('login');
//     Route::post('logout', [AuthController::class,'logout']);
// });


// Route::prefix('users')->group(function () {
//     Route::get('/', [UsersController::class,'getUser']);
//     Route::get('/{id}', [UsersController::class,'getUserId']);
//     Route::post('/',[UsersController::class,'postUser']);
//     Route::put('/{id}', [UsersController::class,'putUser']);
//     Route::put('/{id}/password',[UsersController::class,'putPasUser'] );
//     Route::delete('/{id}', [UsersController::class,'delUser']);
// });


Route::post('front',[frontController::class,'data']);



Route::prefix('db')->group(function () {
    Route::post('migrate',Database\MigrateController::class);
    Route::post('seed',Database\SeedController::class);
});


Route::prefix('back')->group(function(){

      //前後端要換不同的controller
    Route::prefix('auth')->group(function () {
        Route::get('/', [AuthController::class,'me']);
        Route::post('login', [AuthController::class,'login'])->name('login');
        Route::post('logout', [AuthController::class,'logout']);
    });
    
    Route::prefix('opentime')->group(function(){
        
        Route::get('/{id}',[OpenTimeController::class,'GetOpenTime']);
        Route::post('/',[OpenTimeController::class,'CreateOpenTime']);
        Route::put('/{id}',[OpenTimeController::class,'UpdateOpenTime']);
        Route::delete('/{id}', [OpenTimeController::class,'DeleteOpentime']);

    });

    Route::prefix('reserve')->group(function(){

        Route::post('/',[TeacherReserveContorller::class,'CreateTReserve']);
        Route::put('/{id}',[TeacherReserveContorller::class,'UpdateTReserve']);
        Route::delete('/{id}',[TeacherReserveContorller::class,'DeleteTReserve']);
    });

    Route::prefix('account')->group(function(){


    });

    

});



Route::prefix('front')->group(function(){

    //前後端要換不同的controller
    Route::prefix('auth')->group(function () {
        Route::get('/', [AuthController::class,'me']);
        Route::post('login', [AuthController::class,'login'])->name('login');
        Route::post('logout', [AuthController::class,'logout']);
    });

   
    

});






