<?php

use App\Http\Controllers\CircuitsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'circuits'], function () {
    Route::get('/', [CircuitsController::class, 'list']);
    Route::get('/{id}', [CircuitsController::class, 'info']);
});

Route::prefix('api/circuits')->group(function () {
    Route::get('/', [CircuitsController::class, 'apiList'])->name('api.circuits.list');
    Route::get('/{id}', [CircuitsController::class, 'apiInfo'])->name('api.circuits.info');

    // Example POST route to create a new circuit (requires updating the controller)
    Route::post('/', [CircuitsController::class, 'apiCreate'])->name('api.circuits.create');
});
