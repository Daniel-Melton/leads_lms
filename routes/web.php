<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('leads', App\Http\Controllers\LeadController::class);
Route::resource('agents', App\Http\Controllers\AgentController::class);
Route::resource('statuses', App\Http\Controllers\StatusController::class);
