<?php
$cars = [
    "BMW" => ["model" => "X5", "speed" => 120, "doors" => 5, "year" => "2015"],
    "TOYOTA" => ["model" => "RAV4", "speed" => 130, "doors" => 5, "year" => "2018"],
    "OPEL" => ["model" => "Omega", "speed" => 110, "doors" => 5, "year" => "2011"]
];

foreach ($cars as $car => $items)
{
    echo "<h3>$car</h3>";
    echo "<ul>";
    foreach ($items as $key => $value)
    {
        echo "<li>$key : $value</li>";
    }
    echo "</ul>";
}
