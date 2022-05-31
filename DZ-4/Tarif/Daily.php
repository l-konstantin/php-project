<?php
class Daily
{
    const PRICE_ONE_KM = 1;
    const PRICE_TWENTY_FOUR_HOURS = 1000;
    use GPS;
    use Driver;

    public function calcDaily($distance, $time, $age, $gps, $driver)
    {
        if ($age < 18 || $age > 65) {
            echo "Расчет невозможен. Либо Вы молоды, либо уже на пенсии";
            return null;
        }

        $daily = $this->calcDailyTime($time);
        $hours = $this->calcHours($time);
        $ageRatio = $this->calcAgeRatio($age);
        $gps = $this->gpsHour($gps);
        $add = $this->addDriver($driver);
        $total_price = (($distance * self::PRICE_ONE_KM) + ($daily * self::PRICE_TWENTY_FOUR_HOURS) + ($hours * $gps) + $add)*$ageRatio;
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

    private function calcDailyTime($time)
    {
        $result = $time / 24;
        return ceil($result);
    }

    private function calcHours($time)
    {
        return $time;
    }
}