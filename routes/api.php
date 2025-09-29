<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TransactionsController;


// test
Route::get('/test', [TransactionsController::class, 'test']);

// == TRANSACTION ==
// add
Route::post('/transactions/add', [TransactionsController::class, 'addTransaction']);
