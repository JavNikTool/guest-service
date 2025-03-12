<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::resource('guests', GuestController::class);
