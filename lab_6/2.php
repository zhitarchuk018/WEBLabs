<?php
function request($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
    curl_close($ch);
    return $response;
}

echo "Custom Headers:\n";
echo request('https://jsonplaceholder.typicode.com/posts/1', 'GET', null, [
        'X-Custom-Header: HelloWorld',
        'User-Agent: MySimpleClient'
    ]) . "\n\n";

// POST
echo "Send JSON:\n";
echo request('https://jsonplaceholder.typicode.com/posts', 'POST', [
        'title' => 'JSON Title',
        'body' => 'With JSON',
        'userId' => 42
    ]) . "\n\n";

// Параметры в URL
$params = http_build_query(['userId' => 1]);
echo "GET with URL Params:\n";
echo request("https://jsonplaceholder.typicode.com/posts?$params") . "\n\n";
?>
