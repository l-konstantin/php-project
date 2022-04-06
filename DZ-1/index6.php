<?php
$cols = 10;
$rows = 10;

for ($i = 1; $i <= $rows; $i++) {
    echo "<table>";
    echo "<tr>";
    for ($j = 1; $j <= $cols; $j++) {
        if(($i != '1' && $j == '1') || ($i == '1' && $j != '1') || ($i == '1' && $j == '1')) {
            echo "<td width='40'>" . $i * $j . "</td>";
        } elseif (($i * $j) % 2) {
            echo "<td width='40'>" . "[" . $i * $j . "]" . "</td>";
        } elseif (($i * $j % 2) == 0) {
            echo "<td width='40'>" . "(" . $i * $j . ")" . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
?>

<style>
    table {
        border: 1px solid #000;
        text-align: center;
        width: 500px;
    }
    td {
        text-align: center;
        padding: 5px;
    }
</style>
