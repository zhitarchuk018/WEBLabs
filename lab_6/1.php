<?php
function request($url, $method = 'GET', $data = null) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
    } elseif (in_array($method, ['PUT', 'DELETE'])) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    }

    if ($data !== null) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

echo "GET:\n" . request('https://jsonplaceholder.typicode.com/posts/1') . "\n\n";
echo "POST:\n" . request('https://jsonplaceholder.typicode.com/posts', 'POST', ['title'=>'Hi','body'=>'Test','userId'=>1]) . "\n\n";
echo "PUT:\n" . request('https://jsonplaceholder.typicode.com/posts/1', 'PUT', ['id'=>1,'title'=>'New','body'=>'Edit','userId'=>1]) . "\n\n";
echo "DELETE:\n" . request('https://jsonplaceholder.typicode.com/posts/1', 'DELETE') . "\n\n";
?>
