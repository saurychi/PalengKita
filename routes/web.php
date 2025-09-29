<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TransactionsController;

Route::get('/', function () {
    return view('home');
});

// == CUSTOMER ==
// add
Route::get('/signup', [CustomersController::class, 'signup'])->name('customers.signup');
Route::post('/signup', [CustomersController::class, 'addCustomer'])->name('customers.add');

// display (many)
Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');

// diaply (one)
Route::get('/customers/{customer}', [CustomersController::class, 'displayCustomer'])->name('customers.displayCustomer');

// edit
Route::get('/customers/{customer}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomersController::class, 'update'])->name('customers.update');

// delete
Route::delete('/customers/{customer}', [CustomersController::class, 'delete'])->name('customers.delete');

// == TRANSACTIONS ==
Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions.index');
