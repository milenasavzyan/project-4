<?php

require_once '../model/WeatherModel.php';

class WeatherController
{
    private $model;

    public function __construct()
    {
        $this->model = new WeatherModel('40a3bcb2ababe8ec74d527180590f791');
    }

    public function index()
    {
        $city = $_GET['city'] ?? "New York";
        if ($weatherData = $this->model->getWeatherData($city)) {
            $weather_description = $weatherData['weather'][0]['description'];
            $temperature_kelvin = $weatherData['main']['temp'];
            $temperature_celsius = $temperature_kelvin - 273.15;
            $humidity = $weatherData['main']['humidity'];
            $wind_speed = $weatherData['wind']['speed'];

            echo "<p><strong>City:</strong> $city</p>";
            echo "<p><strong>Weather:</strong> $weather_description</p>";
            echo "<p><strong>Temperature:</strong> $temperature_celsius &deg;C</p>";
            echo "<p><strong>Humidity:</strong> $humidity%</p>";
            echo "<p><strong>Wind Speed:</strong> $wind_speed m/s</p>";
        } else {
            echo "<p>Failed to fetch weather data. Please try again later.</p>";
        }
    }
    public function foo()
    {
        require_once "../view/weather.php";
    }
}
