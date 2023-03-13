<?php

namespace App\Controllers;

use Firebase\JWT\JWT;


class AuthController
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
        $data = (array) json_decode(file_get_contents("php://input"));
        if (isset($data['user']) && isset($data['pass'])) {
            $user = $data['user'];
            $pass = $data['pass'];
        }
        if (isset($user) && $user == 'admin' && $pass == 'admin') {
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
            echo json_encode(array(
                "message" => "Successful login.",
                "jwt" => $jwt
            ));
        } else {
            echo json_encode(array(
                "message" => "Login failed.",
                "error" => "Invalid credentials"
            ));
            exit(http_response_code(401));
        }
    }
}
