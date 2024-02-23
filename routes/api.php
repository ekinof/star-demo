<?php

declare(strict_types=1);

use App\Http\Controllers\StarController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('stars', StarController::class)
    ->only([
        'index',
    ]);

Route::middleware('auth')->group(function () {
    Route::resource('stars', StarController::class)
        ->only([
            'store',
            'show',
            'update',
            'destroy',
        ]);
});
