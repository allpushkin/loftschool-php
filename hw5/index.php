<?php

class Car
{
    protected $Engine;
    public $model;

    public function __construct($model, $transmission, $power)
    {
        $this->Engine = new Engine($transmission, $power);
        $this->model = $model;
    }

    public function Move($distance, $speed, $direction)
    {
        $this->Engine->Start();
        $this->Engine->setSpeed($direction, $speed);
        $this->Engine->maxSpeed($speed);
        $this->Engine->getCool($distance, $speed);
        $this->Engine->turnOff();
    }

}

class Engine
{
    protected $power;
    protected $transmission;
    protected $temperature = 0;

    public function __construct($transmission, $power)
    {
        $this->transmission = $transmission;
        $this->power = $power;
    }

    public function getTransmission() {
        return $this->transmission;
    }

    public function Start() {
        echo "Engine started!\n";
    }

    public function turnOff() {
        echo "Engine turned off!\n";
    }

    public function maxSpeed($speed) {
        $max = $this->power * 2;

        if ($speed > $max) {
            return $max;
        } else {
            return $speed;
        }

    }

    public function getCool($distance, $speed) {
        for ($done = 0; $done <= $distance; $done += $this->maxSpeed($speed)) {
            if ($done == 0) {
                echo "Начинаем движение!\n";
                continue;
            }

            $this->temperature += $speed / 10 * 5;

            if ($this->temperature >= 90) {
                $this->temperature -= 10;
                echo "Turn on cooler!\n";
            }

            echo "Driving $done. Temperature is $this->temperature.\n";
        }
    }

    public function setSpeed($direction, $speed)
    {
        switch ($direction) {
            case 'fwd':
                echo "Switch Forward\n";
                break;
            case 'bck':
                echo "Switch Backward\n";
                break;
        }

        if ($this->getTransmission() == 'MT') {
            switch ($speed) {
                case $speed <= 20:
                    echo "Turn speed N1\n";
                    break;
                case $speed > 20:
                    echo "Turn speed N2\n";
                    break;
            }
        }

    }

}

$bmw = new Car("BMW", "MT", 50);
$bmw->Move(2000, 10, "fwd");
