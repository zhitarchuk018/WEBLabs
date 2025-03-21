<?php
<?php
// Заполнение массива
$array = [];
for ($i = 1; $i <= 5; $i++) {
    $array[] = str_repeat('x', $i);
}
print_r($array);

// Функция arrayFill
function arrayFill($value, $count) {
    return array_fill(0, $count, $value);
}
print_r(arrayFill('x', 5));

// Сумма элементов двухмерного массива
$array = [[1, 2, 3], [4, 5], [6]];
$sum = 0;
foreach ($array as $subArray) {
    $sum += array_sum($subArray);
}
echo $sum;

// Создание массива с двумя циклами
$array = [];
$count = 1;
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $array[$i][$j] = $count++;
    }
}
print_r($array);

// Умножение и сложение элементов массива
$array = [2, 5, 3, 9];
$result = ($array[0] * $array[1]) + ($array[2] * $array[3]);
echo $result;

// Массив с данными пользователя
$user = ['name' => 'John', 'surname' => 'Doe', 'patronymic' => 'Smith'];
echo $user['surname'] . " " . $user['name'] . " " . $user['patronymic'];

// Массив с текущей датой
$date = ['year' => date('Y'), 'month' => date('m'), 'day' => date('d')];
echo $date['year'] . "-" . $date['month'] . "-" . $date['day'];

// Количество элементов массива
$arr = ['a', 'b', 'c', 'd', 'e'];
echo count($arr);

// Последний и предпоследний элементы массива
echo end($arr);
echo prev($arr);
?>
?>