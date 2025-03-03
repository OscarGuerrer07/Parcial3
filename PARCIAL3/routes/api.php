<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakeStoreController;
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


Route::get('/products', [FakeStoreController::class, 'index']);
Route::get('/products/{id}', [FakeStoreController::class, 'show']);
Route::post('/products', [FakeStoreController::class, 'store']);
Route::put('/products/{id}', [FakeStoreController::class, 'update']);
Route::delete('/products/{id}', [FakeStoreController::class, 'destroy']);