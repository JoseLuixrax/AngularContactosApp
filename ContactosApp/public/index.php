<?php
require_once("../app/Config/config.php");
require_once('../vendor/autoload.php');

use App\Controllers\AuthController;
use App\Core\Router;
use App\Controllers\ContactosController;
use App\Controllers\Test;
use App\Core\Bootstrap;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

$bootstrap = new Bootstrap();
$bootstrap->declararConst();

$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);

// if($request == "/login"){
//     $auth = new AuthController();
// }

// if($request == "/testeando"){
//     $test = new Test();
// }

// $jwt = $_SERVER['HTTP_AUTHORIZATION'] ?? null;
// if($jwt && $request != "/login"){
//     $jwt = explode(" ", $jwt)[1];
//     try{
//         $decoded = JWT::decode($jwt, new Key(KEY, 'HS256'));
//         echo (json_encode(array(
//             "message" => "Access granted.",
//         )). "\n");
//     } catch
//     (Exception $e){
//         echo json_encode(array(
//             "message" => "Access denied.",
//             "error" => $e->getMessage()
//         ));
//         exit(http_response_code(401));
//     }
// } else {
//     if($request == "/login"){
//         exit();
//     }
//     echo json_encode(array(
//         "message" => "Access denied.",
//         "error" => "No token provided"
//     ));
//     exit(http_response_code(401));
// }

$router = new Router();
$router->add(array(
    'name' => 'home',
    'path' => '/^\/contactos$/',
    'action' => [ContactosController::class, 'handleRequest']
));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/contactos\/[0-9]*$/',
    'action' => [ContactosController::class, 'handleRequest']
));

$route = $router->match($request);
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No route";
}
