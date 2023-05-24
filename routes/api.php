<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
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

// for the register route start
Route::post('register', [AuthController::class, 'register']);
// for the register route start ends

//login route
// Route::post('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('login', [AuthController::class, 'login']);
//login route ends

// post route start
// Route::middleware('auth:api')->group(function () {
//     Route::apiResource('posts', BlogPostController::class);
// });
Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('blog-posts', BlogPostController::class);
});
// post route start ends
