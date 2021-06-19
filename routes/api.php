<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeeController;

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

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class,'login']);
});


/** should to be authenticated */

Route::group(['middleware' => ['api','jwt.token'], 'prefix' => 'dashboard'], function () {

    // start Company Routs
    Route::group(['prefix'=>'company'], function(){

        Route::get('/', [CompanyController::class, 'index']);
        Route::post('create', [CompanyController::class,'create']);
        Route::post('update', [CompanyController::class,'update']);
        Route::post('delete', [CompanyController::class,'delete']);

    }); // end of company group


    // start Employee Routs
    Route::group(['prefix'=>'employee'], function(){

        Route::get('/', [EmployeeController::class,'index']);
        Route::post('create', [EmployeeController::class,'create']);
        Route::post('update', [EmployeeController::class,'update']);
        Route::post('delete', [EmployeeController::class,'delete']);

    }); // end of Employee group


});

