<?php

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::prefix("v1")->group(function () {
    Route::get("/users", [App\Http\Controllers\Api\v1\UserController::class, "index"]);
    Route::get("/users/{user}", [App\Http\Controllers\Api\v1\UserController::class, "show"]);

    Route::get("/invoices", [App\Http\Controllers\Api\v1\InvoiceController::class, "index"]);
    Route::get("/invoices/{invoice}", [App\Http\Controllers\Api\v1\InvoiceController::class, "show"]);
    Route::post("/invoices", [App\Http\Controllers\Api\v1\InvoiceController::class, "store"]);
});
