<?php

namespace WeatherMonitoring;

/**
 *
 * @author adair
 */
interface Observable 
{
    public function registerObserver(Observer $o): void;
    
    public function removeObserver(Observer $o): void;
    
    public function notifyObservers($args = null): void;
}