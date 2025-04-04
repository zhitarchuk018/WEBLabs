<?php
<?php
session_start();

$bookname = $_SESSION['bookname'] ?? 'Не задано';
$author = $_SESSION['author'] ?? 'Не задано';
$year = $_SESSION['year'] ?? 'Не задано';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваши данные</title>
</head>
<body>

<h2>Ваши данные</h2>
<p><strong>Название книги:</strong> <?php echo htmlspecialchars($bookname); ?></p>
<p><strong>Автор книги:</strong> <?php echo htmlspecialchars($author); ?></p>
<p><strong>Год издания:</strong> <?php echo htmlspecialchars($year); ?></p>

<a href="form.php">Назад к форме</a>

</body>
</html>
?>