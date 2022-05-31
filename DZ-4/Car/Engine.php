<?php

include 'TransmissionAuto.php';
include 'TransmissionManual.php';

class Engine
{
    const START_STARTER = "on";
    const STOP_STARTER = "off";
    private $state = "on";
    private $temperature = 0;
    protected $transmission = 0;
    public $model;
    public $hp = 1;
    use TransmissionAuto;
    use TransmissionManual;

    public function __construct($model, $transmission, $hp)
    {
        $this->model = $model;
        $this->transmission = $transmission;
        $this->hp = $hp;
    }

    public function getTransmission()
    {
        return $this->transmission;
    }

    public function startEngine()
    {
        if ($this->state === self::START_STARTER) {
            $this->state = self::START_STARTER;
            echo "Двигатель включен</br>";
        }
    }

    public function stopEngine()
    {
        if ($this->state !== self::STOP_STARTER) {
            $this->state = self::STOP_STARTER;
            echo "Двигатель выключен<br>";
        }
    }

    public function maxSpeed($speed)
    {
        $max = $this->hp * 2;
        if ($speed > $max) {
            return $max;
        } else {
            return $speed;
        }
    }

    public function getCool($distance, $speed)
    {
        for ($done = 0; $done <= $distance; $done += $this->maxSpeed($speed)) {
            if ($done == 0) {
                echo "Начинаем двигаться<br>";
                continue;
            }
            $this->temperature += $speed / 10 * 5;
            if ($this->temperature >= 90) {
                $this->temperature -= 10;
                echo "Вентилятор включен!<br>";
            }
            echo "<br>Скорость $done км/ч. Температура двигателя $this->temperature C.<br>";
            if ($done === $distance) {
                echo "<br>Достигнут пункт назначения!<br>";
            }
        }
    }

    public function setSpeed($direction, $speed)
    {
        if ($this->getTransmission() == 'MT') {
            $this->Manual($speed);
        } elseif ($this->getTransmission() == 'AV') {
            $this->Automatic($direction);
        }
    }
}