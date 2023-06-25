<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariationController;
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
    Route::get("/products", [ProductController::class, "get"]);
    Route::get("/discounts", [DiscountController::class, "get"]);
    Route::get("/tax", [TaxController::class, "get"]);
    Route::get("/variations", [VariationController::class, "get"]);
});
