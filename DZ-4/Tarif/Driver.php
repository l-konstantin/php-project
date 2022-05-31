<?php

trait Driver
{
    public function addDriver($driver)
    {
        if ($driver == 'on') {
            $result = 100;
        } else {
            $result = 0;
        }
        return $result;
    }
}
