<?php

require 'vendor/autoload.php';

use WeatherMonitoring\WeatherData;
use WeatherMonitoring\CurrentConditionsDisplay;
use WeatherMonitoring\HeatIndexDisplay;

$weatherData = new WeatherData();
        
$currentDisplay = new CurrentConditionsDisplay($weatherData);
$heatIndexData = new HeatIndexDisplay($weatherData);

$weatherData->setMeasurements(87, 60, 30);

$weatherData->setMeasurements(75, 55, 28);