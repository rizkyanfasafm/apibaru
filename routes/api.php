<?php

use App\Http\Controllers\PaketController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/paket', [PaketController::class, 'index']);
Route::post('/paket', [PaketController::class, 'store']);
Route::get('/paket/{id}', [PaketController::class, 'show']);
Route::delete('/paket/{id}', [PaketController::class, 'destroy']);
