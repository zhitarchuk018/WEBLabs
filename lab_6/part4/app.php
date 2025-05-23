<?php
require_once 'ApiClient.php';

// используем httpbin.org, который поддерживает Basic Auth
$client = new ApiClient('https://httpbin.org', 'user', 'pass');

echo "GET:\n";
print_r($client->get('/basic-auth/user/pass'));

echo "\nPOST:\n";
print_r($client->post('/anything', ['title' => 'Hello', 'body' => 'World']));

echo "\nPUT:\n";
print_r($client->put('/anything', ['update' => 'value']));

echo "\nDELETE:\n";
print_r($client->delete('/anything'));
?>
