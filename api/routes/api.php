<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Invoice\InvoiceController;
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

//Route::any('{segment}', function () {
//    return response()->json([
//        'data' => [],
//        'success' => false,
//        'status' => 404,
//        'message' => 'Invalid Route'
//    ], 404);
//})->where('segment', '.*');
//
//Route::fallback(function () {
//    return response()->json(['data' => [], 'success' => false, 'status' => 404, 'message' => 'Invalid Route'], 404);
//});
//
//Route::get('unauthorized', function () {
//    return response()->json([
//        'success' => false,
//        'status' => 401,
//        'message' => 'Unauthorized access. It is necessary to pass the access token.',
//    ], 401);
//})->name('unauthorized');
