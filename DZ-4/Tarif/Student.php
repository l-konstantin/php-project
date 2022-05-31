<?php
class Student
{
    const PRICE_ONE_KM = 4;
    const PRICE_ONE_MINUTE = 1;
    use GPS;

    public function calcStudent($distance, $time, $age, $gps)
    {
        if ($age < 18 || $age > 65) {
            echo "Расчет невозможен. Либо Вы молоды, либо уже на пенсии.";
            return null;
        }

        $minutes = $this->calcMinute($time);
        $hours = $this->calcHours($time);
        $ageRatio = $this->calcAgeRatio($age);
        $ageStudentTariff = $this->calcAgeStudent($age);
        $gps = $this->gpsHour($gps);
        $total_price = (($distance * self::PRICE_ONE_KM) + ($minutes * self::PRICE_ONE_MINUTE) + ($hours * $gps)) * $ageRatio * $ageStudentTariff;
        return $total_price;
    }

    private function calcAgeStudent($age)
    {
        if ($age >= 18 && $age <= 25) {
            $ageStudent = 1;
        } else {
            return null;
        }
        return $ageStudent;
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

    private function calcMinute($time)
    {
        return $time;
    }

    private function calcHours($time)
    {
        $result = $time / 60;
        return ceil($result);
    }
}