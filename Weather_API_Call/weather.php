<?php
/*
 > https://openweathermap.org/api/one-call-3

Programmatūra, kas pieprasa ievadīt PILSĒTU, un uz ekrāna izdrukā laikapstākļus t.sk mitrumu.
Izmantojot pārbaudes darbā iegūtās zināšanas.
 */

// API KEY
$apiKey = 'd351ae49b12e5924df985c7ed25999ce';

// A function to read data from an apiURL and @ is used to suppress warnings for invalid data inputs.
function getWeather(string $city, string $apiKey): string
{
    $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid=$apiKey";
    $response = @file_get_contents($apiUrl);
    return $response;
}

// A function to change wind degrees in wind direction.
function getWindDirection(float $degrees): string
{
    $directions = [
        'N', 'NNE', 'NE', 'ENE',
        'E', 'ESE', 'SE', 'SSE',
        'S', 'SSW', 'SW', 'WSW',
        'W', 'WNW', 'NW', 'NNW'
    ];
    $index = round(($degrees % 360) / 22.5);
    return $directions[$index];
}

// A function to get the data and display it accordingly.
function displayWeather(string $weatherData)
{
    $data = json_decode($weatherData, true);

    if ($data !== null && $data['cod'] === 200) {
        $city = $data['name'];
        $country = $data['sys']['country'];
        $weather = $data['weather'][0]['main'];
        $weatherDescription = $data['weather'][0]['description'];
        $temperature = $data['main']['temp'];
        $humidity = $data['main']['humidity'];
        $pressure = $data['main']['pressure'];
        $windSpeed = $data['wind']['speed'];
        $windDegrees = $data['wind']['deg'];
        $windDirection = getWindDirection($windDegrees);

        echo "Weather in $city, $country: $weather, $weatherDescription\n";
        echo "Current temperature: " . round($temperature, 1) . "°C\n";
        echo "Wind: $windDirection $windSpeed m/s\n";
        echo "Humidity: $humidity %\n";
        echo "Pressure: $pressure hPa\n";

    } else {
        echo "City not found or API error.\n";
    }
}

$city = readline("Enter the city: ");

$weatherData = getWeather($city, $apiKey);
displayWeather($weatherData);

