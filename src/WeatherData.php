<?php

namespace WeatherMonitoring;

/**
 * Description of WeatherData
 *
 * @author adair
 */
class WeatherData implements Observable
{
    
    private array $observers;
    private float $temperature;
    private float $humidity;
    private float $pressure;
    
    
    public function __construct() {
        $this->observers = [];
    }
    
    public function registerObserver(Observer $o): void 
    {
        $index = array_search($o, $this->observers);
        
        if($index === false){
            array_push($this->observers, $o);
        }
    }

    public function removeObserver(Observer $o): void 
    {
        $index = array_search($o, $this->observers);
        
        if($index !== false){
            unset($this->observers[$index]);
        }
    }
    
    public function notifyObservers($args = null): void 
    {
        foreach ($this->observers as $observer){
            $observer->update($this);
        }
    }
    
    
    public function measurementsChanged(): void
    {
        $this->notifyObservers();
    }
    
    public function setMeasurements(float $temperature, float $humidity, float $pressure):void 
    {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
    
    public function getTemperature(): float 
    {
        return $this->temperature;
    }

    public function getHumidity(): float 
    {
        return $this->humidity;
    }

    public function getPressure(): float 
    {
        return $this->pressure;
    }



}