<?php
trait TransmissionManual
{
    public function Manual($speed) {
        if ($speed <= 20) {
            echo "<br>Включается первая передача<br>";
        } elseif ($speed >= 20) {
            echo "<br>Включается вторая передача<br>";
        }
    }
}
