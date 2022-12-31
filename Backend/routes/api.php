<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ItemTransactionController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post("/login", [AuthController::class, "login"])->name('login');
Route::get("/me", [AuthController::class, "getUser"])->middleware("auth:sanctum");
Route::post("/register", [AuthController::class, "register"])->name('register');

Route::get('/product',[ProductController::class,"index"]);
Route::get("/product/{id}", [ProductController::class, "show"]);
Route::post("/product", [ProductController::class, "store"]);
Route::post("/product/{id}/edit", [ProductController::class, "update"]);
Route::post("/product/{id}/delete", [ProductController::class, "destroy"]);

Route::get('/transaksi',[TransactionController::class,"index"]);
Route::get("/transaksi/{id}", [TransactionController::class, "show"]);
Route::post("/transaksi", [TransactionController::class, "store"]);
Route::post("/transaksi/{id}/edit", [TransactionController::class, "update"]);
Route::post("/transaksi/{id}/delete", [TransactionController::class, "destroy"]);

Route::get('/itemtransaksi',[ItemTransactionController::class,"index"]);
Route::get("/itemtransaksi/{id}", [ItemTransactionController::class, "show"]);
Route::post("/itemtransaksi", [ItemTransactionController::class, "store"]);
Route::post("/itemtransaksi/{id}/edit", [ItemTransactionController::class, "update"]);
Route::post("/itemtransaksi/{id}/delete", [ItemTransactionController::class, "destroy"]);
