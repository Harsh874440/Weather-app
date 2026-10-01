<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', [WeatherController::class, 'index']);

Route::get('/weather', [WeatherController::class, 'search'])
    ->name('weather.search');