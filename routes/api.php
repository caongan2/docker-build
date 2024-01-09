<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
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
Route::middleware('auth-sanctum')->group(function () {
    
});
Route::get('/index', [ContactController::class, 'index']);
Route::delete('/delete/{id}', [ContactController::class, 'delete']);
Route::post('/store', [ContactController::class, 'storeContact']);
Route::get('/show/{id}', [ContactController::class, 'show']);

Route::post('/login', [LoginController::class, 'authenticate']);
