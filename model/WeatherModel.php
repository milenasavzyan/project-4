<?php

class WeatherModel
{
    private $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
    }

    public function getWeatherData($city)
    {
        $url = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $this->api_key;
        $response = file_get_contents($url);

        if ($response) {
            return json_decode($response, true);
        } else {
            return false;
        }
    }

}
