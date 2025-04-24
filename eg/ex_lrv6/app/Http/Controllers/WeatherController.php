<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    public function getWeather()
    {
        // Agrega 'OPENWEATHER_API_KEY' con tu OpenWeather API key en el archivo .env
        // php artisan config:clear paraeliminar la cache de configuración
        $apiKey = env('OPENWEATHER_API_KEY');
        
        $client = new Client();

        // API endpoint URL con tu direccion deseada y unidades (e.g., London, Metric units)
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=London&units=metric&appid={$apiKey}";

        try {
            // Make a GET request to the OpenWeather API
            $response = $client->get($apiUrl);

            // Obtener el cuerpo de la respuesta como un array
            $data = json_decode($response->getBody(), true);

            // Mostramos los datos recibidos en una vista
            return view('weather', ['weatherData' => $data]);

        } catch (\Exception $e) {
            // Muestra los errores que ocurrieron durante la API request
            return view('weather_api_error', [
                'message' => 'Error al obtener los datos del clima.',
                'error' => $e->getMessage(),
            ]);
        }
    }

}
