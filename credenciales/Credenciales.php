<?php

class Credenciales{

    //Variables para acceder a la bd
    private $usuario = 'root';
    private $bd = 'pruebas';
    private $password = '';
    private $host = 'localhost';

    public function getUsuario(){
        return $this->usuario;
    }

    public function getBd(){
        return $this->bd;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getHost(){
        return $this->host;
    }

}

 

?>