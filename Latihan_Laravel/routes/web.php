<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/store', [TodoController::class, 'store']);

Route::put('/todo/{id}/selesai', [TodoController::class, 'selesai']);
Route::delete('/todo/{id}/hapus', [TodoController::class, 'hapus']);
