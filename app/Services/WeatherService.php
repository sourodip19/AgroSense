<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getWeather($lat, $lon)
    {
        $apiKey = env('OPENWEATHER_API_KEY');

        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apiKey}&units=metric";

        $response = Http::get($url);

        return $response->json();
    }
}