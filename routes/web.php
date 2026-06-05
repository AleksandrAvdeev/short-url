<?php

use App\Http\Controllers\LinksController;
use Illuminate\Support\Facades\Route;

Route::get('/{code}', [LinksController::class, 'redirect'])->where('code', '[a-zA-Z0-9]{6}');