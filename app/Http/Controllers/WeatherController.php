<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather');
    }

    public function search(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->city;

        $response = Http::get(
            'https://api.openweathermap.org/data/2.5/weather',
            [
                'q' => $city,
                'appid' => config('services.openweather.key'),
                'units' => 'metric',
            ]
        );

        if ($response->failed()) {
    dd(
        $response->status(),
        $response->json()
    );
}

        $weather = $response->json();

        return view('weather', compact('weather'));
    }
}