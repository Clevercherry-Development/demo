<?php

use App\Http\Controllers\CircuitsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('circuits')->group(function () {
    Route::get('/', [CircuitsController::class, 'apiList'])->name('api.circuits.list');
    Route::get('/{id}', [CircuitsController::class, 'apiInfo'])->name('api.circuits.info');


    Route::post('/', [CircuitsController::class, 'apiCreate'])->name('api.circuits.create');
    Route::put('/{id}', [CircuitsController::class, 'apiUpdate'])->name('api.circuits.update');
    Route::delete('/{id}', [CircuitsController::class, 'apiDelete'])->name('api.circuits.delete');
});
