<?php

function task1($text1, $text2, $text3)
{
    $array = array($text1, $text2, $text3);
    echo "<p>" . $array[0] . "</p>";
    echo "<p>" . $array[1] . "</p>";
    echo "<p>" . $array[2] . "</p>";
    if ($text2 == true) {
        echo "$text1" . " $text2 " . "$text3";
    }
    return array($text1, $text2, $text3);
}

function task2($operator, $args)
{
    $res = 0;
    foreach ($args as $j => $element) {
        if (is_numeric($element)) {
            if ($j > 0) {
                switch ($operator) {
                    case ' + ':
                        $res += $element;
                        break;
                    case ' - ':
                        $res -= $element;
                        break;
                    case ' * ':
                        $res *= $element;
                        break;
                    case ' / ':
                        $res /= $element;
                        break;
                    default:
                        echo "Введенный элемент не имеет отношение к математическому";
                        return;
                }
            } else {
                $res = $element;
            }
        } else {
            echo "Выполнение функции не возможно, в массиве должны быть только числа";
            return;
        }
    }
    $expression = implode($operator, $args);
    echo $expression . '=' . $res;
    eval("\$expression = \"$expression\";");
}

function task3($rows, $cols)
{
    if (($cols <= 0 || $rows <= 0) || ($cols > 8 || $rows > 8)) {
        echo "Функция выдает Корректную ошибку.";
    } else {
        for ($i = 1; $i <= $rows; $i++) {
            echo "<table>";
            echo "<tr>";
            for ($j = 1; $j <= $cols; $j++) {
                echo "<td width='40'>" . $i * $j . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

function task4()
{
    $date = date("d.m.y H:i");
    echo $date;

    $unixTime = strtotime('24.02.2016 00:00:00');
    echo "</br>" . $unixTime;
}

function task5()
{
    $test = "Карл у Клары украл Кораллы";
    $test = mb_strtolower($test);
    echo $test . "</br>";
    $text2 = "Две бутылки лимонада";
    $changetext = str_replace("Две", "Три", $text2);
    echo $changetext;
}

function task6($filename)
{
    $text = "Hello again!";

    file_put_contents($filename, $text);
    echo file_get_contents('index.txt', $text);
}
