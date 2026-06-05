<?php

use App\Http\Controllers\LinksController;
use Illuminate\Support\Facades\Route;

Route::post('/links', [LinksController::class, 'store']);
Route::get('/links/{code}/stats', [LinksController::class, 'stats']);