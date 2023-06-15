<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

Route::get("/test-temporary", [UserController::class, "generateUrl"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get("/users", [UserController::class, "getListUsers"]);
    Route::post("/categories", [CategoryController::class, "create"]);
    Route::get("/categories", [CategoryController::class, "get"]);
    Route::get("/tags", [TagController::class, "get"]);
});
