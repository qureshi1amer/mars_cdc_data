<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CdcDataController;



Route::middleware('auth:sanctum')->get('/cdc-data', [CdcDataController::class, 'index']);
Route::get('/token', [CdcDataController::class, 'token']);
