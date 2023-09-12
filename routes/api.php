<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PersonController;


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

//-----Stage 1 Task
Route::get('/task1', [ApiController::class, 'zuriTask1']);

//---Stage 2 Task
Route::get('/', [PersonController::class, 'index']);
Route::post('/person', [PersonController::class, 'store']);
Route::get('/person', [PersonController::class, 'show']);
Route::put('/person', [PersonController::class, 'update']);
Route::delete('/person', [PersonController::class, 'destroy']);

