<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $category = $_POST["category"];
    $title = preg_replace("/[^a-zA-Zа-яА-Я0-9_\s]/u", "", $_POST["title"]); 
    $text = $_POST["textarea"];

    if (!empty($email) && !empty($category) && !empty($title) && !empty($text))
    {
        $filename = "$category/" . str_replace("@","$",$email) . "/" . str_replace(" ", "_", $title) . ".txt";
        if (!file_exists($filename))
        {
            mkdir("$category/" . str_replace("@","$",$email));
        }
        file_put_contents($filename, $text);
    }
}

$ads = [];
$categories = ["Игры", "Развлечения", "Билеты"];
foreach ($categories as $c)
{
    $dir = opendir($c);
    while ($email = readdir($dir))
    {
        if ($email != "." && $email != ".." && is_dir("$c/$email"))
        {
            $files = glob("$c/$email/*.txt");
            $email = str_replace("$","@",$email);
            foreach ($files as $f)
            {
                $text = file_get_contents($f);
                $ads[] = [
                    "category" => $c,
                    "title" => pathinfo($f, PATHINFO_FILENAME),
                    "text" => $text,
                    "email" => $email
                ];
            }
        }
    }
}
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
            <option value="Игры">Охота</option>
            <option value="Развлечения">Рыбалка</option>
            <option value="Билеты">Туризм</option>
        </select>
        <label for="title">Заголовок:</label>
        <input type="text" name="title" required>
        <label for="email">e-mail:</label>
        <input type="email" name="email" required>
        <br>
        <label for="text">Текст:</label>
        <br>
        <textarea name="textarea" cols="100" rows="10"  required>Место для новых объявлений</textarea>
        <br>
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
        <?php foreach ($ads as $ad): ?>
        <tr>
            <td><?= htmlspecialchars($ad["category"]) ?></td>
            <td><?= htmlspecialchars($ad["title"]) ?></td>
            <td><?= htmlspecialchars($ad["email"]) ?></td>
            <td><pre><?= htmlspecialchars($ad["text"]) ?></pre></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>