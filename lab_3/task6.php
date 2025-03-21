<?php
// Остаток от деления
$a = 10;
$b = 3;
echo $a % $b;

// Проверка деления без остатка
if ($a % $b == 0) {
    echo 'Делится: ' . ($a / $b);
} else {
    echo 'Делится с остатком: ' . ($a % $b);
}

// Возведение в степень
$st = pow(2, 10);
echo $st;

// Квадратный корень
echo sqrt(245);

// Корень из суммы квадратов элементов массива
$array = [4, 2, 5, 19, 13, 0, 10];
$sum = 0;
foreach ($array as $value) {
    $sum += $value ** 2;
}
echo sqrt($sum);

// Округление
echo round(sqrt(379), 0);
echo round(sqrt(379), 1);
echo round(sqrt(379), 2);

$sqrt587 = sqrt(587);
$rounded = ['floor' => floor($sqrt587), 'ceil' => ceil($sqrt587)];
print_r($rounded);

// Минимум и максимум
$numbers = [4, -2, 5, 19, -130, 0, 10];
echo min($numbers);
echo max($numbers);

// Случайное число
echo rand(1, 100);

// Массив случайных чисел
$randomArray = [];
for ($i = 0; $i < 10; $i++) {
    $randomArray[] = rand(1, 100);
}
print_r($randomArray);

// Модуль разности
$a = 10;
$b = 7;
echo abs($a - $b);

// Массив с положительными числами
$array = [1, 2, -1, -2, 3, -3];
$positiveArray = array_map('abs', $array);
print_r($positiveArray);

// Делители числа
$number = 30;
$divisors = [];
for ($i = 1; $i <= $number; $i++) {
    if ($number % $i == 0) {
        $divisors[] = $i;
    }
}
print_r($divisors);

// Сумма первых элементов массива
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sum = 0;
$count = 0;
foreach ($array as $value) {
    $sum += $value;
    $count++;
    if ($sum > 10) {
        break;
    }
}
echo $count;
?>
?>