<?php

use App\Http\Controllers\Api\Invoice\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Invoice Routes
|--------------------------------------------------------------------------
|
| Define routes for managing invoices. These routes are protected by the
| 'auth:sanctum' middleware, ensuring that only authenticated users can
| perform CRUD operations on invoices. The resource routes cover actions
| such as index, create, store, show, edit, update, and destroy.
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/invoices', InvoiceController::class);
});
