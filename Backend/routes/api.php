<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\QuizeControllerler;
use App\Http\Controllers\Api\SummeryController;
use App\Http\Controllers\Api\QaController;




#  login & register
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('user', [AuthController::class, 'user']);
    Route::delete('logout', [AuthController::class, 'logout']);
    #  
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('quize', QuizeControllerler::class);
    Route::apiResource('qa', QaController::class);

    Route::get('/task/summery', [SummeryController::class, 'TaskSummery']);
});
