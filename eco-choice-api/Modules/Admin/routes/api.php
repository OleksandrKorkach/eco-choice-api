<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\App\Http\Controllers\ProductController;

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

//Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
//    Route::get('admin', fn (Request $request) => $request->user())->name('admin');
//});

Route::post('admin/product/create', [ProductController::class, 'create']);
Route::delete('admin/product/delete', [ProductController::class, 'delete']);
Route::patch('admin/product/update', [ProductController::class, 'update']);
Route::get('admin/product/all', [ProductController::class, 'getAll']);
Route::get('admin/product', [ProductController::class, 'get']);
