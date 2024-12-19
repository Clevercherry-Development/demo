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
