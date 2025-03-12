<?php

use App\Http\Controllers\GuestController;
use App\Http\Middleware\DebugHeaders;
use Illuminate\Support\Facades\Route;

Route::resource('guests', GuestController::class)->middleware(DebugHeaders::class);
