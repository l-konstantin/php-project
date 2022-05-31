<?php

require_once 'Engine.php';

class Car extends Engine
{
    protected $Engine;
    public $model;

    public function __constrict($model, $transmission, $hp)
    {
        $this->Engine = new Engine($transmission, $hp);
        $this->model = $model;
    }

    public function move($distance, $speed, $direction)
    {
        $this->startEngine();
        $this->setSpeed($direction, $speed);
        $this->maxSpeed($speed);
        $this->getCool($distance, $speed);
        $this->stopEngine();
    }
}
