<?php
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['bookname'] = $_POST['bookname'] ?? '';
    $_SESSION['author'] = $_POST['author'] ?? '';
    $_SESSION['year'] = $_POST['year'] ?? '';

    header("Location: display.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма ввода</title>
</head>
<body>

<h2>Введите ваши данные</h2>
<form method="post">
    <label>Название книги: <input type="text" name="bookname" required></label><br><br>
    <label>Автор книги: <input type="password" name="author" required></label><br><br>
    <label>Год издания: <input type="date" name="year" required></label><br><br>
    <button type="submit">Сохранить</button>
</form>

</body>
</html>
?>