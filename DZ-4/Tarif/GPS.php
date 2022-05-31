<?php

trait GPS
{
    public function gpsHour($gps)
    {
        if ($gps == 'on') {
            $result = 15;
        } else {
            $result = 0;
        }
        return $result;
    }
}
