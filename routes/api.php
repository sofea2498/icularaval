<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
   
   Log::debug(["user: ", $request->user()]);
    // return $request->user();

    return response()->json([
        'data' => "hello World",
    ]);
});
// ->middleware('auth:sanctum');


