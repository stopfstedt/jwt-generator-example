<?php

require 'vendor/autoload.php';


/**
 * @param string $key
 * @param string $aud
 * @param string $iss
 * @param array $addl_payload_params
 * @return string
 */
function createNewToken($key, $aud, $iss, $addl_payload_params = array()) {

    $now = new \DateTime('now');
    $expires = new \Datetime('now');
    $expires->add(new \DateInterval("P42D")); // sets token expiration date to six weeks from now
    $payload = array();
    $payload['iat'] = $now->format('U');
    $payload['exp'] = $expires->format('U');
    $payload['iss'] = $iss;
    $payload['aud'] = $aud;
    $payload = array_merge($payload, $addl_payload_params);
    return JWT::encode($payload, $key);
}