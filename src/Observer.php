<?php

namespace WeatherMonitoring;

/**
 *
 * @author adair
 */
interface Observer 
{
    public function update(Observable $o, $args = null): void;
}
