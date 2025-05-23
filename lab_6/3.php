<?php
function request($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
    } elseif (in_array($method, ['PUT', 'DELETE'])) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    }

    if ($data !== null) {
        if (is_array($data)) {
            $data = json_encode($data);
            $headers[] = 'Content-Type: application/json';
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($error) {
        echo "Ошибка запроса: $error\n";
    } elseif ($code >= 400) {
        echo "HTTP ошибка $code\nОтвет:\n$response\n";
    } else {
        echo "Успешно (HTTP $code)\n";
        $data = json_decode($response, true);
        print_r($data);
    }

    echo "\n\n";
}

echo "Успешный GET:\n";
request('https://jsonplaceholder.typicode.com/posts/1');

echo "Ошибка 404:\n";
request('https://jsonplaceholder.typicode.com/posts/999999');

echo "Ошибка curl:\n";
request('https://bad.domain.test');
?>
