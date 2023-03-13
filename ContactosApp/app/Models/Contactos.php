<?php
namespace App\Models;

class Contactos extends DBAbstractModel{

    private static $instancia;
    public static function getInstancia()
    {
        if(!isset(self::$instancia)){
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    public function getAll(){
        $this->query = "SELECT * FROM contactos";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function get($data = array()){
        $id = $data['id'];
        $this->query = "SELECT * FROM contactos where id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function set($data = array()){
        $nombre = $data['nombre'];
        $telefono = $data['telefono'];
        $email = $data['email'];
        $this->query = "INSERT INTO contactos (nombre,telefono,email) VALUES (:nombre,:telefono,:email)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['telefono'] = $telefono;
        $this->parametros['email'] = $email;
        $this->get_results_from_query();
        $this->mensaje = 'Contacto agregado exitosamente';
    }

    public function delete($data = array()){
        $id = $data['id'];
        $this->query = "DELETE FROM contactos where id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Contacto eliminado exitosamente';
    }

    public function edit($data = array()){
        $id = $data['id'];
        $nombre = $data['nombre'];
        $telefono = $data['telefono'];
        $email = $data['email'];
        $this->query = "UPDATE contactos set nombre=:nombre,telefono=:telefono,email=:email where id=:id";
        $this->parametros['id'] = $id;
        $this->parametros['nombre'] = $nombre;
        $this->parametros['telefono'] = $telefono;
        $this->parametros['email'] = $email;
        $this->get_results_from_query();
        $this->mensaje = 'Contacto editado exitosamente';
    }
}