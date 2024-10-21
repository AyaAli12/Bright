<?php

use App\Http\Controllers\Api\AdminProfileController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Models\CompanyInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['prefix'=>'services'], routes: function(): void{
    Route::get('',[ServiceController::class,'index']);
    Route::post('',[ServiceController::class,'store']);
    Route::put('/unarchive/{id}',[ServiceController::class,'unarchive']);
    Route::put('/archive/{id}',[ServiceController::class,'archive']);
    Route::put('/{id}', [ServiceController::class, 'update']);
    Route::delete('/{id}', [ServiceController::class, 'destroy']);
    });

////
    Route::group(['prefix'=>'branches'], routes: function(): void{
      Route::get('',[BrancheController::class,'index']);
      Route::post('',[BrancheController::class,'store']);
      Route::put('/unarchive/{id}',[BrancheController::class,'unarchive']);
      Route::put('/archive/{id}',[BrancheController::class,'archive']);
      Route::put('/{id}', [BrancheController::class, 'update']);
      Route::delete('/{id}', [BrancheController::class, 'destroy']);
      });
      ////
      Route::group(['prefix'=>'projects'], routes: function(): void{
        Route::get('',[ProjectController::class,'index']);
        Route::post('',[ProjectController::class,'store']);
        Route::put('/unarchive/{id}',[ProjectController::class,'unarchive']);
        Route::put('/archive/{id}',[ProjectController::class,'archive']);
        Route::put('/{id}', [ProjectController::class, 'update']);
        Route::delete('/{id}', [ProjectController::class, 'destroy']);
        });
        ////

        Route::group(['prefix'=>'clients'], routes: function(): void{
          Route::get('',[ClientController::class,'index']);
          Route::post('',[ClientController::class,'store']);
          Route::put('/unarchive/{id}',[ClientController::class,'unarchive']);
          Route::put('/archive/{id}',[ClientController::class,'archive']);
          Route::put('/{id}', [ClientController::class, 'update']);
          Route::delete('/{id}', [ClientController::class, 'destroy']);
        });
        ////
        Route::group(['prefix'=>'contacts'], routes: function(): void{
          Route::get('',[ContactController::class,'index']);
          Route::post('',[ContactController::class,'store']);
          Route::put('/unarchive/{id}',[ContactController::class,'unarchive']);
          Route::put('/archive/{id}',[ContactController::class,'archive']);
          Route::put('/{id}', [ContactController::class, 'update']);
          Route::delete('/{id}', [ContactController::class, 'destroy']);
        });
        ////
        Route::group(['prefix'=>'companies'], routes: function(): void{
          Route::get('',[CompanyInformationController::class,'index']);
          Route::post('',[CompanyInformationController::class,'store']);
          Route::put('/unarchive/{id}',[CompanyInformationController::class,'unarchive']);
          Route::put('/archive/{id}',[CompanyInformationController::class,'archive']);
          Route::put('/{id}', [CompanyInformationController::class, 'update']);
          Route::delete('/{id}', [CompanyInformationController::class, 'destroy']);
        });
        Route::group(['prefix'=>'Home'], routes: function(): void{
          Route::get('/companies',[HomeController::class,'companies']);
          Route::get('/branches',[HomeController::class,'branches']);
          Route::get('/clients',[HomeController::class,'clients']);
          Route::get('/contacts',[HomeController::class,'contacts']);
          Route::get('/projects',[HomeController::class,'projects']);
          Route::get('/services',[HomeController::class,'services']);
        });
        ////
        Route::group([

          'prefix' => 'auth'
      ], function () {
          //login Api
          Route::post('/login', [AuthController::class, 'login']);
          //register Api
          Route::post('/register', [AuthController::class, 'register']);
          //LogOut Api
          Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
      });
      //apis of admin account
      Route::group(['middleware' => ['auth:sanctum','isAdmin']], function () {
          //update the profile information api
          Route::post('/updateAdminProfile', [AdminProfileController::class, 'update']);
      });



