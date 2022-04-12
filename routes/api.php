<?php

use App\Http\Controllers\AuthController;
use App\Actions\Handlers\HandlerResponse;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

Route::get('/hola', function () {
    return HandlerResponse::responseJSON([
        'message' => 'Hola usuario'
    ], 200);
});
Route::post('auth/login', [AuthController::class, 'login'])->name('login');
Route::post('auth/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        // Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('dashboard', DashboardController::class);
});
