<?php

include 'GPS.php';

class Basic
{
    const ONE_KM = 10;
    const ONE_MINUTE = 3;
    use GPS;

    public function calcTarif($distance, $time, $age, $gps) {
        if ($age < 18 || $age > 65) {
            echo "Расчет невозможен. Либо Вы молоды для вожднения, либо уже на пенсии";
            return null;
        }
        $minutes = $this->calcMinutes($time);
        $hours = $this->calcHours($time);
        $ageRatio = $this->calcAgeRatio($age);
        $addGps = $this->gpsHour($gps);
        $total_price = (($distance * self::ONE_KM) + ($minutes * self::ONE_MINUTE) + ($hours * $addGps)) * $ageRatio;
        return $total_price;
    }

    private function calcAgeRatio($age){
        if ($age >= 18 && $age <= 21) {
            $result = 1.1;
        } else {
            $result = 1;
        }
        return $result;
    }

    private function calcMinutes($time) {
        return $time;
    }

    private function calcHours($time) {
        return $time / 60;
    }
}