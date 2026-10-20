<?php


use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Config\Services;

function getJWTFromRequest($authenticationHeader): string
{
    if (is_null($authenticationHeader)) {
        throw new Exception(message: 'Missing or invalid JWT in Request');
    }
    $parts = explode(' ', $authenticationHeader);
    if (!isset($parts[1])) {
        throw new Exception('Missing or invalid JWT in Request');
    }

    return $parts[1];
}

function validateJWTFromRequest(string $encodedToken)
{
    $key = new Key(Services::getSecretKey(), 'HS256');
    $decodedToken = JWT::decode($encodedToken, $key);

    return $decodedToken;
}

function getSignedJWTForUser(int $cedula)
{
    $issuedAtTime = time();
    $tokenTimeToLive = getenv('JWT_TIME_TO_LIVE');
    $expirationTime = $issuedAtTime + $tokenTimeToLive;


    $payload = [
        "cedula" => $cedula,
        "issuedAt" => $issuedAtTime,
        "expirationTime" => $expirationTime,
    ];

    $jwt = JWT::encode($payload, Services::getSecretKey(), 'HS256');
    return $jwt;
}
