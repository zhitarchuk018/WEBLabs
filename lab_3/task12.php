<?php
// Среднее арифметическое
$array = [1, 2, 3, 4, 5];
echo array_sum($array) / count($array);

// Сумма чисел от 1 до 100
echo array_sum(range(1, 100));

// Массив с квадратными корнями
$array = [1, 4, 9, 16];
$sqrtArray = array_map('sqrt', $array);
print_r($sqrtArray);

// Массив с буквами алфавита
$alphabet = array_combine(range('a', 'z'), range(1, 26));
print_r($alphabet);

// Сумма пар чисел
$str = '1234567890';
$pairs = str_split($str, 2);
echo array_sum($pairs);
?>
?>