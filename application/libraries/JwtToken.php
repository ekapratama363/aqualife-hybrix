<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

class JwtToken
{
    private $headers;
    private $key;

    public function __construct()
    {
        $this->headers = [];
        foreach($_SERVER as $name => $value) {
            if ($name != 'HTTP_MOD_REWRITE' && (substr($name, 0, 5) == 'HTTP_' || $name == 'CONTENT_LENGTH' || $name == 'CONTENT_TYPE')) {
                $name = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', str_replace('HTTP_', '', $name)))));
                if ($name == 'Content-Type') $name = 'Content-type';
                $this->headers[$name] = $value;
            }
        }

        $this->key = 'secret_key';
    }

    public function encode($payload)
    {
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600; // 1 hour = 3600 seconds

        $payload['iat'] = $issuedAt;
        $payload['exp'] = $expirationTime;

        return JWT::encode($payload, $this->key, 'HS256');
    }

    public function validate()
    {
        $token = $this->headers['Token'] ?? null;
        if (!$token) {
            return null;
        }

        try {        
            return JWT::decode($token, new Key($this->key, 'HS256'));
        } catch (ExpiredException $e) {
            // echo "Token has expired: " . $e->getMessage();
            return null;
        } catch (Exception $e) {
            // echo "Invalid token: " . $e->getMessage();
            return null;
        }
    }
}