<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::prefix('v1')->group(function () {
    Route::get('/dashboard', function () {
        return 'api dashboard';
    });
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/users', [PostController::class, 'show'])->middleware('restrictRole:admin');
        Route::put('/users/{id}', [PostController::class, 'update'])->middleware('restrictRole:moderator');
    });
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});