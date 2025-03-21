<?php
<?php
// Функция проверки суммы
function checkSum($a, $b) {
    return ($a + $b) > 10;
}

echo checkSum(5, 6) ? 'true' : 'false';

// Функция проверки равенства
function checkEqual($a, $b) {
    return $a == $b;
}

echo checkEqual(5, 5) ? 'true' : 'false';

// Сокращенная форма if
$test = 0;
echo $test == 0 ? 'верно' : '';

// Проверка возраста
$age = 25;
if ($age < 10 || $age > 99) {
    echo "Число вне диапазона";
} else {
    $sum = array_sum(str_split($age));
    if ($sum <= 9) {
        echo "Сумма цифр однозначна";
    } else {
        echo "Сумма цифр двузначна";
    }
}

// Проверка количества элементов массива
$arr = [1, 2, 3];
if (count($arr) == 3) {
    echo array_sum($arr);
}
?>
?>