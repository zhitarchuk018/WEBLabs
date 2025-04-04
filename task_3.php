<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подсчёт слов и символов</title>
    <style>
        textarea {
            width: 300px;
            height: 100px;
            margin-bottom: 10px;
        }
        button {
            padding: 5px 10px;
            cursor: pointer;
        }
        .result {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Анализатор текста</h2>
    <form method="POST">
        <textarea name="text" placeholder="Введите текст..."></textarea><br>
        <button type="submit">Анализировать</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $text = $_POST['text'] ?? '';
        
        $charCount = mb_strlen($text);
        
        $words = preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $wordCount = count($words);
        
        $vowelCount = 0;
        $vowelLetters = 'аеёиоуыэюяaeiouАЕЁИОУЫЭЮЯAEIOU';
        
        foreach ($words as $word) {
            $firstChar = mb_substr($word, 0, 1);
            if (mb_strpos($vowelLetters, $firstChar) !== false) {
                $vowelCount++;
            }
        }
        
        echo '<div class="result">';
        echo '<p>Символов: ' . $charCount . '</p>';
        echo '<p>Слов: ' . $wordCount . '</p>';
        echo '<p>Слов на гласную: ' . $vowelCount . '</p>';
        echo '</div>';
    }
    ?>
</body>
</html>