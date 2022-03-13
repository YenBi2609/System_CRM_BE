<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CallController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailController;

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
Route::post('login', [UserController::class, 'login']);


// Users
Route::get('users', [UserController::class, 'index']);
Route::post('create/users', [UserController::class, 'store']);
Route::put('update-user/{id}', [UserController::class, 'update']);
Route::delete('delete-user/{id}', [UserController::class, 'destroy']);

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

// Call
Route::get('calls', [CallController::class, 'index']);
Route::post('create/calls', [CallController::class, 'store']);
Route::put('update-call/{id}', [CallController::class, 'update']);
Route::delete('delete-call/{id}', [CallController::class, 'destroy']);

// Oder 
Route::get('orders', [OrderController::class, 'index']);
Route::post('create/orders', [OrderController::class, 'store']);
Route::put('update-order/{id}', [OrderController::class, 'update']);
Route::delete('delete-order/{id}', [OrderController::class, 'destroy']);

// OderDetail
Route::get('orderDetails', [OrderDetailController::class, 'index']);
Route::post('create/orderDetails', [OrderDetailController::class, 'store']);
Route::put('update-orderDetail/{id}', [OrderDetailController::class, 'update']);
Route::delete('delete-orderDetail/{id}', [OrderDetailController::class, 'destroy']);



// Route::group(['prefix' => '/users'],
// function () {
//     Route::get('/index', [UserController::class ,'index']);
// });