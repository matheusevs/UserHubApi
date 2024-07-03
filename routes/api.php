<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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

Route::get('/getUsers', [UserController::class, 'get']);
Route::get('/editUser/{id}', [UserController::class, 'edit']);
Route::post('/createUser', [UserController::class, 'create']);
Route::delete('/deleteUser/{id}', [UserController::class, 'delete']);
Route::put('/updateUser/{id}', [UserController::class, 'update']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
