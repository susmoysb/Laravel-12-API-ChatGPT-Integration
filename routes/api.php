<?php

use App\Http\Controllers\API\ChatGPTController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('send-message', [ChatGPTController::class, 'sendMessage']);
