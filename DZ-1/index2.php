<?php
const DRAWINGS = 80;
const MARKERS = 23;
const PENCILS = 40;
const PAINT = DRAWINGS - MARKERS - PENCILS;

echo "Дана задача:</br>" . DRAWINGS . " рисунков</br>";
echo MARKERS . " фломастера.</br>";
echo PENCILS . " карандашей.</br>";
echo "Сколько рисунков выполненные красками?</br></br>";

echo DRAWINGS . " рисунков " . "- " . MARKERS . " фломастеры" . " - "  . PENCILS .
    " карандашей" . " = " . PAINT . " рисунков красками" . "</br></br>";

echo "Ответ: " . PAINT . " рисунков выполненные красками, на школьных выставках.";
