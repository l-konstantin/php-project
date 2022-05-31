<?php

function task1()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    $xml = simplexml_load_file('src/data.xml');
    echo "<h1>Данные доставки товара</h1>";
    echo "<div class='customer_billing'>";

    foreach ($xml->Address as $Address)
    {
        echo "<div class='customer_block'>";
        if($Address['Type'] == 'Shipping') {
            echo "<div class='customer'>" . "<h3>Покупатель</h3>" . "</div>";
        } elseif ($Address['Type'] == 'Billing') {
            echo "<div class='customer'>" . "<h3>Продавец</h3>" . "</div>";
        }
        echo "<div class='customer'>" . "<h3>" .  "</h3>" . "</div>";
        echo "<div class='customer'>" . "<p>Имя и Фамилия: </p>" . "<h3>" . $Address->Name . "</h3>" . "</div>";
        echo "<div class='customer'>" . "<p>Улица: </p>" . "<h3>" .  $Address->Street . "</h3>" . "</div>";
        echo "<div class='customer'>" . "<p>Город: </p>" . "<h3>" .  $Address->City . "</h3>" . "</div>";
        echo "<div class='customer'>" . "<p>Штат: </p>" . "<h3>" .  $Address->State . "</h3>" . "</div>";
        echo "<div class='customer'>" . "<p>Индекс: </p>" . "<h3>" .  $Address->Zip . "</h3>" . "</div>";
        echo "<div class='customer'>" . "<p>Страна: </p>" . "<h3>" .  $Address->Country . "</h3>" . "</div>";
        echo "</div>";
    }

    echo "</div>";

    echo "<div class='table_block'>";
    echo "<table width='50%' border='1' align='center' cellspacing='0' bgcolor='#f5f5f5'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th>Номер заказа</th>";
    echo "<th>Название продукта</th>";
    echo "<th>Кол-во</th>";
    echo "<th>Цена</th>";
    echo "<th>Комментарии</th>";
    echo "<th>Дата</th>";
    foreach ($xml->Items->Item as $Item)
    {
        echo "<tr>";
        echo "<td width='72'>" . $Item['PartNumber'] . "</td>";
        echo "<td width='72'>" . $Item->ProductName . "</td>";
        echo "<td width='72'>" . $Item->Quantity . "</td>";
        echo "<td width='72'>" . $Item->USPrice . "</td>";
        echo "<td width='72'>" . $Item->Comment . "</td>";
        echo "<td width='72'>" . $Item->ShipDate . "</td>";
        echo "</tr>";
    }
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "<div class='customer_recom'>" . "<p>Рекоммендации: </p>". "<h4 class='customer_h4'>" . $xml->DeliveryNotes . "</h4>" . "</div>";
}
?>

<style>
    body {
        margin: 0;
        padding: 0;
    }
    .customer_billing {
        display: flex;
        width: 750px;
        justify-content: space-between;
        align-items: flex-start;
    }
    .customer_block {
        display: flex;
        flex-direction: column;
        width: 50%;
        margin-right: 20px;
    }
    .customer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 25px;
    }
    .customer_h4 {
        margin-left: 20px;
    }
    .customer_recom {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        height: 40px;
    }
    h3, h4, p {
        margin: 0;
    }
    table {
        margin: 40px 0;
    }
</style>

<?php

function task2()
{
    $product = array(
        "productName" => "Car",
        "productModel" => "BMW",
        "color" => "red",
    );
    $json_text = json_encode($product);

    //создан массив и сохранен в файле output.json
    $file = fopen('output.json', 'w');
    file_put_contents('output.json', $json_text);
    fclose($file);
    echo "Файл успешно записан" . "</br>";

    //Открыть файл output.json. Используется функция rand().

    $change = rand(0, 1);
    if ($change == 1) {
        $oldName = "red";
        $name = "black";
        $oldName = trim($oldName);
        $newName = trim($name);
        $fl = file_get_contents('output.json');
        $taskList = json_decode($fl, true);
        foreach ($taskList as $product) {
            if (in_array($oldName, $product)) {
                $taskList = array("color" => $newName);
            }
        }
        file_put_contents('output2.json', json_encode($taskList));
        unset($taskList);
    } else {
        echo "<br>Нет изменений!<br>";
        $fl = file_get_contents('output.json');
        $taskList = json_decode($fl, true);
        file_put_contents('output2.json', json_encode($taskList));
        unset($taskList);
    }

    //сравнение и вывод информации
//    $firstFile = file_get_contents('output.json');
//    $secondFile = file_get_contents('output2.json');
//    $taskList1 = json_decode($firstFile, true);
//    $taskList2 = json_decode($secondFile, true);
//
//    $result = array_diff($taskList2, $taskList1);
//    echo "<br>Сравнение двух файлов<br>";
//    echo $result;
}

function task3($value)
{
    $array = [];
    $i = 0;
    while ($i < $value) {
        array_push($array, rand(1, 100));
        $i++;
    }

    //массив записывает в файл csv
    $fp = fopen('text.csv', 'w');
    fputcsv($fp, $array, ';');
    fclose($fp);
    echo "Файл успешно записан" . "</br>";

    //подсчет четных чисел массива в файле csv
    $fp = fopen('text.csv', 'r');
    fgetcsv($fp, 100, ';');

    $sum = array_filter($array, function ($val) {
        return $val % 2 == 0;
    });
    echo "Сумма четных чисел: " . array_sum($sum);
    fclose($fp);
}

function task4()
{
    $info = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');

    echo "Title: " . substr($info, '586', 9) . "</br>";
    echo "Page_id: " . substr($info, '541', 8) . "</br>";
}
