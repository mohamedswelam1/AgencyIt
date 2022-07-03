<?php

use App\Http\Controllers\Api\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Api\Employee\ReviewController as EmployeeReviewController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\AuthController;
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


Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::group(['middleware'=> 'auth:sanctum'],function(){
    Route::group([
        'prefix'=>'admin',
        'middleware'=>'is_admin',
        'as'=> 'admin.'
    ],function(){
        Route::get('/users/index',[UserController::class,'index'])->name('users.index');
        Route::post('/users/create',[UserController::class,'create'])->name('users.create');
        Route::PUT('/users/update/{id}',[UserController::class,'update'])->name('users.update');
        Route::GET('/users/show/{id}',[UserController::class,'show'])->name('users.show');
        Route::PUT('/users/assignreviewer/{id}',[UserController::class,'assignAsReviewer'])->name('users.assignreviewer');
        Route::DELETE('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
        Route::GET('review/index',[AdminReviewController::class,'index']);
        Route::POST('review/create',[AdminReviewController::class,'create']);
        Route::PUT('review/update/{id}',[AdminReviewController::class,'update']);
        Route::GET('review/show/{id}',[AdminReviewController::class,'show']);
      
    });
    Route::group([
      'prefix'=>'user',
      'as'=>'user.'
    ],function(){
        Route::post('review/create',[EmployeeReviewController::class,'create']);
        Route::get('review/index',[EmployeeReviewController::class,'index']);
    });
    Route::post('/logout', [AuthController::class, 'logout']);


});
