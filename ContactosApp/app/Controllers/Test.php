<?php

namespace App\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;


class Test
{

    public function __construct()
    {
        $this->handleRequest();
    }

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'POST':
                $this->login();
                break;
            default:
                echo "Method not allowed \n";
                break;
        }
    }

    public function login()
    {
        $key = KEY;
        $tiempo = time();
        $notBeforeClaim = time();
        $expire = $tiempo + 3600;
        $payload = [
            'iss' => 'http://contactos.api.u9.local/',
            'aud' => 'http://contactos.api.u9.local/',
            'iat' => $tiempo,
            'nbf' => $notBeforeClaim,
            'exp' => $expire,
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        try{
            $decoded = JWT::decode($jwt, new Key(KEY, 'HS256'));
            echo json_encode(array(
                "message" => "Access granted.",
                "data" => $decoded
            ));
        } catch
        (Exception $e){
            echo json_encode(array(
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ));
            exit(http_response_code(401));
        }
    }

}
