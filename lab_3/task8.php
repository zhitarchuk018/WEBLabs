<?php
<?php
function increaseEnthusiasm($str) {
    return $str . "!";
}

echo increaseEnthusiasm("Hello");

function repeatThreeTimes($str) {
    return $str . $str . $str;
}

echo repeatThreeTimes("Hi");

echo increaseEnthusiasm(repeatThreeTimes("Hey"));

function cut($str, $length = 10) {
    return substr($str, 0, $length);
}

echo cut("This is a long string", 5);

// Рекурсивный вывод массива
function printArray($array, $index = 0) {
    if ($index < count($array)) {
        echo $array[$index] . " ";
        printArray($array, $index + 1);
    }
}

$array = [1, 2, 3, 4, 5];
printArray($array);

// Сумма цифр числа
function sumDigits($number) {
    $sum = array_sum(str_split($number));
    if ($sum > 9) {
        return sumDigits($sum);
    }
    return $sum;
}

echo sumDigits(12345);
?>
?>