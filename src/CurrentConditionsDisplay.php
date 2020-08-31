<?php

namespace WeatherMonitoring;

/**
 * Description of CurrentConditionsDisplay
 *
 * @author adair
 */
class CurrentConditionsDisplay implements Observer 
{
    private float $temperature;
    
    private float $humidity;
    
    private WeatherData $weatherData;    
    
    public function __construct(WeatherData $weatherData) 
    {
        $this->weatherData = $weatherData;
        $this->weatherData->registerObserver($this);
    }
    
    //put your code here
    public function update(Observable $o, $args = null): void {
        
        if($o instanceof WeatherData){
            $this->temperature = $o->getTemperature();
            $this->humidity = $o->getHumidity();
        }
        
        $this->display();
    }
    
    public function display(){
        echo "\nCurrent conditions: " . $this->temperature . "F degrees and " . $this->humidity . "% humidity\n";
    }

}