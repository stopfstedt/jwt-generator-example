<?php

require __DIR__ . '/lib.php';

$key = 'mysupersecretkey';
$iss = 'acme';
$aud = 'acme';

$token = createNewToken($key, $aud, $iss, array('lorem' => 'ipsum'));


$decoded_token = JWT::decode($token, $key, array('HS256'));

echo "TOKEN {$token}\n";
echo "DECODED TOKEN :\n";
var_dump($decoded_token);
