<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("/user")->group(function () {
    Route::get("/", [UserController::class, "index"]);
    Route::get("/{id}", [UserController::class, "detail"]);
    Route::post("/", [UserController::class, "create"]);
    Route::put("/{id}", [UserController::class, "update"]);
    Route::delete("/{id}", [UserController::class, "delete"]);
});

Route::prefix("/post")->group(function () {
    Route::get("/", [PostController::class, "index"]);
    Route::get("/{id}", [PostController::class, "detail"]);
    Route::post("/", [PostController::class, "create"]);
    Route::put("/{id}", [PostController::class, "update"]);
    Route::delete("/{id}", [PostController::class, "delete"]);
});

Route::prefix("/comment")->group(function () {
    Route::get("/{post_id}/post", [CommentController::class, "index"]);
    Route::post("/", [CommentController::class, "create"]);
    Route::put("/{id}", [CommentController::class, "update"]);
    Route::delete("/{id}", [CommentController::class, "delete"]);
});
