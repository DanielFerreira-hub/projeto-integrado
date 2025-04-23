<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaintenanceLogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SupplierController;

// User Routes
Route::get('/users', [UserController::class, 'getAll']);
Route::get('/users/{id}', [UserController::class, 'getById']);
Route::post('/users', [UserController::class, 'create']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);

// Asset Routes
Route::get('/assets', [AssetController::class, 'getAll']);
Route::get('/assets/{id}', [AssetController::class, 'getById']);
Route::post('/assets', [AssetController::class, 'create']);
Route::put('/assets/{id}', [AssetController::class, 'update']);
Route::delete('/assets/{id}', [AssetController::class, 'delete']);

// Assignment Routes
Route::get('/assignments', [AssignmentController::class, 'getAll']);
Route::get('/assignments/{id}', [AssignmentController::class, 'getById']);
Route::post('/assignments', [AssignmentController::class, 'create']);
Route::put('/assignments/{id}', [AssignmentController::class, 'update']);
Route::delete('/assignments/{id}', [AssignmentController::class, 'delete']);

// Category Routes
Route::get('/categories', [CategoryController::class, 'getAll']);
Route::get('/categories/{id}', [CategoryController::class, 'getById']);
Route::post('/categories', [CategoryController::class, 'create']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'delete']);

// Location Routes
Route::get('/locations', [LocationController::class, 'getAll']);
Route::get('/locations/{id}', [LocationController::class, 'getById']);
Route::post('/locations', [LocationController::class, 'create']);
Route::put('/locations/{id}', [LocationController::class, 'update']);
Route::delete('/locations/{id}', [LocationController::class, 'delete']);

// MaintenanceLog Routes
Route::get('/maintenance-logs', [MaintenanceLogController::class, 'getAll']);
Route::get('/maintenance-logs/{id}', [MaintenanceLogController::class, 'getById']);
Route::post('/maintenance-logs', [MaintenanceLogController::class, 'create']);
Route::put('/maintenance-logs/{id}', [MaintenanceLogController::class, 'update']);
Route::delete('/maintenance-logs/{id}', [MaintenanceLogController::class, 'delete']);

// Role Routes
Route::get('/roles', [RoleController::class, 'getAll']);
Route::get('/roles/{id}', [RoleController::class, 'getById']);
Route::post('/roles', [RoleController::class, 'create']);
Route::put('/roles/{id}', [RoleController::class, 'update']);
Route::delete('/roles/{id}', [RoleController::class, 'delete']);

// Room Routes
Route::get('/rooms', [RoomController::class, 'getAll']);
Route::get('/rooms/{id}', [RoomController::class, 'getById']);
Route::post('/rooms', [RoomController::class, 'create']);
Route::put('/rooms/{id}', [RoomController::class, 'update']);
Route::delete('/rooms/{id}', [RoomController::class, 'delete']);

// Supplier Routes
Route::get('/suppliers', [SupplierController::class, 'getAll']);
Route::get('/suppliers/{id}', [SupplierController::class, 'getById']);
Route::post('/suppliers', [SupplierController::class, 'create']);
Route::put('/suppliers/{id}', [SupplierController::class, 'update']);
Route::delete('/suppliers/{id}', [SupplierController::class, 'delete']);
