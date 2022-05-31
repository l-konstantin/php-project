<?php
include 'Driver.php';

class Hourly
{
    const DISTANCE_ONE_KM = 0;
    const TIME_SIXTY_MINUTE = 200;
    use GPS;
    use Driver;

    public function calcHourly($distance, $time, $age, $gps, $driver) {
        if ($age < 18 || $age > 65) {
            echo "Расчет невозможен. Либо Вы молоды для вожднения, либо уже на пенсии";
            return null;
        }
        $minutes = $this->calcMinutes($time);
        $ageRatio = $this->calcAgeRatio($age);
        $addGps = $this->gpsHour($gps);
        $add = $this->addDriver($driver);

        $total_price = (($distance * self::DISTANCE_ONE_KM) + ($minutes * self::TIME_SIXTY_MINUTE) + ($minutes * $addGps) + $add) * $ageRatio;
        return $total_price;
    }

    private function calcAgeRatio($age)
    {
        if ($age >= 18 && $age <= 21) {
            $result = 1.1;
        } else {
            $result = 1;
        }
        return $result;
    }

    private function calcMinutes($time)
    {
        $result = $time / 60;
        return ceil($result);
    }
}