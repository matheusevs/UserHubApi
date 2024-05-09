<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get("/getUsers", "App\Http\Controllers\UserController@getUsers");
Route::post("/insertUser", "App\Http\Controllers\UserController@insertUser");
Route::delete("/deleteUser", "App\Http\Controllers\UserController@deleteUser");
Route::put("/updateUser", "App\Http\Controllers\UserController@updateUpdateUser");

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
