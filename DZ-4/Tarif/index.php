<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Каршеринг</title>
</head>
<body>
    <h1>Выберите Тариф</h1>
    <form action="#" method="POST">
        <div>
            <label for="age">Сколько Вам лет?</label>
            <input name="age" type="text" id=""/>
        </div>
        <select name="tariff">Выберите тариф
            <option value="basic">Базовый</option>
            <option value="hourly">Почасовой</option>
            <option value="daily">Суточный</option>
            <option value="student">Студенческий</option>
        </select>
        <div>
            <label for="distance">Пройденный путь</label>
            <input name="distance" type="text" id=""/>
        </div>
        <div>
            <label for="time">Время проезда</label>
            <input name="time" type="text" id=""/>
        </div>
        <div>
            <input type="checkbox" name="gps" id=""/>
            <label for="gps">gps в салон</label>
        </div>
        <div>
            <input type="checkbox" name="driver" id=""/>
            <label for="driver">дополнительный водитель</label>
        </div>
        <input type="submit" name="submit" value="Расчитать" />
    </form>
</body>
</html>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'Basic.php';
include 'Hourly.php';
include 'Daily.php';
include 'Student.php';

if(isset($_POST['submit'])) {
    $age = $_POST['age'];
    $value_tariff = $_POST['tariff'];
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    if (isset($_POST['gps'])) {
        $gps_check = $_POST['gps'];
    } else {
        $gps_check = 0;
    }
    if (isset($_POST['driver'])) {
        $driver = $_POST['driver'];
    } else {
        $driver = 0;
    }

    if ($value_tariff == 'basic') {
        $tariff = new Basic();
        $basic = $tariff->calcTarif($distance, $time, $age, $gps_check);
        if (isset($_POST['gps'])) {
            $result = "gps включен";
            $sumGps = " + ".($time / 60) * 15;
        } else {
            $result = "gps выключен";
            $sumGps = '';
        }
        if (isset($_POST['driver'])) {
            $result_driver = "Дополнительный водитель в Базовом тарифе не используется";
        } else {
            $result_driver = "Дополнительный водитель в Базовом тарифе не используется";
        }
        if ($age >= 18 && $age <= 21) {
            $union = 1.1;
        } else {
            $union = 1;
        }

        echo "<br>"."Тариф БАЗОВЫЙ(".$distance."км, ". $time ."минуты, ". $age . "лет, "."доп.услуги: ".$result. ", ".$result_driver. ")" . " = "
            ."(".$distance." * 10" ." + " . $time . " * 3" . $sumGps.")" . " * ". $union . " = ". $basic . " рублей;<br>"
            ."(".$distance." км по 10 рублей плюс " . $time . "минут по 3 рубля".$sumGps.") * коэффициент молодежный " . $union . " = " . $basic . " рублей";
    } elseif ($value_tariff == 'hourly') {
        $tariff = new Hourly();
        $hourly = $tariff->calcHourly($distance, $time, $age, $gps_check, $driver);
        if (isset($_POST['gps'])) {
            $result = "gps включен";
            $sumGps = " + ".($time / 60) * 15;
        } else {
            $result = "gps выключен";
            $sumGps = '';
        }
        if (isset($_POST['driver'])) {
            $result_driver = "Дополнительный водитель используется";
            $sum_driver = " + ". 100;
        } else {
            $result_driver = "Дополнительный водитель не используется";
            $sum_driver = "";
        }
        if ($age >= 18 && $age <= 21) {
            $union = 1.1;
        } else {
            $union = 1;
        }

        echo "<br>"."Тариф ПОЧАСОВОЙ(".$distance."км, ". $time ."минуты, ". $age . "лет, "."доп.услуги: ".$result. ", ".$result_driver. ")" . " = "
            ."(".$distance." * 0" ." + " . $time . " * 200".$sumGps. $sum_driver.")" . " * ". $union . " = ". $hourly . " рублей;<br>"
            ."(".$distance." км по 0 рублей плюс " . $time . "минут (по 200 рублей за 60 минут)".$sumGps.$sum_driver.") * коэффициент молодежный "
            . $union . " = " . $hourly . " рублей";
    } elseif ($value_tariff == 'daily') {
        $tariffDaily = new Daily();
        $daily = $tariffDaily->calcDaily($distance, $time, $age, $gps_check, $driver);
        if (isset($_POST['gps'])) {
            $result = "gps включен";
            $sumGps = " + ". $time * 15;
        } else {
            $result = "gps выключен";
            $sumGps = '';
        }
        if (isset($_POST['driver'])) {
            $result_driver = "Дополнительный водитель используется";
            $sum_driver = " + ". 100;
        } else {
            $result_driver = "Дополнительный водитель не используется";
            $sum_driver = "";
        }
        if ($age >= 18 && $age <= 21) {
            $union = 1.1;
        } else {
            $union = 1;
        }

        echo "<br>"."Тариф СУТОЧНЫЙ(".$distance."км, ". $time ."часа, ". $age . "лет, "."доп.услуги: ".$result. ", ".$result_driver. ")" . " = "
            ."(".$distance." * 1" ." + " ."(". $time ." / 24)" . " * 1000".$sumGps.$sum_driver.")" . " * ". $union . " = ". $daily . " рублей;<br>"
            ."(".$distance." км по 1 рублей плюс " . $time . "часа (24 часа по 1000руб)".$sumGps.$sum_driver.") * коэффициент молодежный "
            . $union . " = " . $daily . " рублей";
    } elseif ($value_tariff == 'student') {
        $tariffStudent = new Student();
        $student = $tariffStudent->calcStudent($distance, $time, $age, $gps_check);

        if (isset($_POST['gps'])) {
            $result = "gps включен";
            $sumGps = " + ".($time / 60) * 15;
        } else {
            $result = "gps выключен";
            $sumGps = '';
        }
        if (isset($_POST['driver'])) {
            $result_driver = "Дополнительный водитель в тарифе Студенческий не используется";
        } else {
            $result_driver = "Дополнительный водитель в тарифе Студенческий не используется";
        }
        if ($age >= 18 && $age <= 21) {
            $union = 1.1;
        } else {
            $union = 1;
        }

        if ($student != 0) {
            echo "<br>" . "Тариф Студенческий(" . $distance . "км, " . $time . "минуты, " . $age . "лет, " . "доп.услуги: " . $result . ", " . $result_driver . ")" . " = "
                . "(" . $distance . " * 4" . " + " . $time . " * 1".$sumGps.")" . " * " . $union . " = " . $student . " рублей;<br>"
                . "(" . $distance . " км по 4 рублей плюс " . $time . "минут (1минута = 1 рубль)".$sumGps.") * коэффициент молодежный "
                . $union . " = " . $student . " рублей";
        } else {
            echo "Ваш возраст не подходит для Студенческого тарифа!";
        }
    } else {
        echo "Такого тарифа не существует";
    }
}

