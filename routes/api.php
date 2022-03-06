<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ProductController;

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

// Users
Route::get('users', [UserController::class, 'index']);

// Task 
Route::get('tasks', [TaskController::class, 'index']);
Route::post('create/tasks', [TaskController::class, 'store']);
Route::put('update-task/{id}', [TaskController::class, 'update']);
Route::delete('delete-task/{id}', [TaskController::class, 'destroy']);

// Client 
Route::get('clients', [ClientController::class, 'index']);
Route::post('create/clients', [ClientController::class, 'store']);
Route::put('update-client/{id}', [ClientController::class, 'update']);
Route::delete('delete-client/{id}', [ClientController::class, 'destroy']);

// Product 
Route::get('products', [ProductController::class, 'index']);
Route::post('create/products', [ProductController::class, 'store']);
Route::put('update-product/{id}', [ProductController::class, 'update']);
Route::delete('delete-product/{id}', [ProductController::class, 'destroy']);

// Route::group(['prefix' => '/users'],
// function () {
//     Route::get('/index', [UserController::class ,'index']);
// });