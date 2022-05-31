<?php
trait TransmissionAuto
{
    public function Automatic($move)
    {
        if ($move == 'вперед') {
            echo "Движение вперед<br>";
        }elseif ($move == 'назад') {
            echo "Движение назад<br>";
        }
    }
}
