<?php
// Подключение к серверу MySQL
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if (mysqli_connect_errno()) {
    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}

// Обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $category = $mysqli->real_escape_string($_POST['category']);
    $description = $mysqli->real_escape_string($_POST['description']);

    $query = "INSERT INTO ad (email, title, description, category) VALUES ('$email', '$title', '$description', '$category')";
    $mysqli->query($query);
}

// Получение всех объявлений
$advertisements = [];
if ($result = $mysqli->query('SELECT * FROM ad ORDER BY created DESC')) {
    while ($row = $result->fetch_assoc()) {
        $advertisements[] = $row;
    }
    $result->close();
}

// Закрытие соединения
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Доска объявлений</title>
</head>
<body>
<h2>Добавить объявление</h2>
<form method="post">
    Категория:
    <select name="category" required>
        <option value="Игры">Игры</option>
        <option value="Развлечения">Развлечения</option>
        <option value="Билеты">Phototechnique</option>
    </select><br>

    <label for="title">Заголовок:</label>
    <input type="text" name="title" required><br>

    <label for="email">e-mail:</label>
    <input type="email" name="email" required><br>

    <label for="description">Текст объявления:</label><br>
    <textarea name="description" cols="100" rows="10" required>Место для вашего объявления</textarea><br>

    <button>Добавить объявление</button>
</form>

<h3>Объявления:</h3>
<table>
    <tr>
        <th>Категория</th>
        <th>Заголовок</th>
        <th>e-mail</th>
        <th>Объявление</th>
    </tr>
    <?php foreach ($advertisements as $ad): ?>
        <tr>
            <td><?= htmlspecialchars($ad['category']) ?></td>
            <td><?= htmlspecialchars($ad['title']) ?></td>
            <td><?= htmlspecialchars($ad['email']) ?></td>
            <td><pre><?= htmlspecialchars($ad['description']) ?></pre></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>