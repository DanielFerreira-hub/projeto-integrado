<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;

Route::get('/users', [UserController::class, 'getAllUsers']);
Route::get('/users/{id}', [UserController::class, 'getUserById']);
Route::post('/users', [UserController::class, 'createUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

Route::get('/devices', [DeviceController::class, 'getAllDevices']);
Route::get('/devices/{id}', [DeviceController::class, 'getDeviceById']);
Route::post('/devices', [DeviceController::class, 'addDevice']);
Route::put('/devices/{id}', [DeviceController::class, 'updateDevice']);
Route::delete('/devices/{id}', [DeviceController::class, 'deleteDevice']);
