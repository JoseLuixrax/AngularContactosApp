<?php

namespace App\Controllers;

use App\Models\Contactos;

class ContactosController extends BaseController{

    public function handleRequest()
    {
        $request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
        $request = explode('/', $request);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET':
                if (isset($request[2])) {
                    $this->get();
                } else {
                    $this->getAll();
                }
                break;
            case 'POST':
                $this->set();
                break;
            case 'PUT':
                $this->update();
                break;
            case 'DELETE':
                $this->delete();
                break;
            default:
                echo "Method not allowed";
                break;
        }
    }

    public function getAll()
    {
        $contactos = Contactos::getInstancia();
        $data = $contactos->getAll();
        echo json_encode($data);
    }

    public function set()
    {
        $contactos = Contactos::getInstancia();
        $data = (array) json_decode(file_get_contents("php://input"));
        // var_dump($data);       
        $contactos->set($data);
        $data = $contactos->getAll();
        echo json_encode($data);
    }

    public function update()
    {
        $contactos = Contactos::getInstancia();
        $data = (array) json_decode(file_get_contents("php://input"));
        $contactos->edit($data);
        $data = $contactos->getAll();
        echo json_encode($data);
    }

    public function delete()
    {
        $contactos = Contactos::getInstancia();
        $request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
        $request = explode('/', $request);
        $contactos->delete($data = [
            'id' => $request[2]
        ]);
        $data = $contactos->getAll();
        echo json_encode($data);
    }

    public function get()
    {
        $contactos = Contactos::getInstancia();
        $request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
        $request = explode('/', $request);
        $result = $contactos->get($data = [
            'id' => $request[2]
        ]);
        echo json_encode($result);
    }
}