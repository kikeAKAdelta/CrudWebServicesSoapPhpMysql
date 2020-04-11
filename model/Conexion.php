<?php

class Conexion{

    private $user;
    private $bd;
    private $host;
    private $cn;
    private $password;

    public function __construct($host, $user, $password, $bd)
    {

        try {
        $this->cn = new PDO("mysql:host=localhost; dbname=" . $bd . ";", $user, $password);

            
        } catch (PDOException $e ) {
	echo 'ERROR: ' . $e->getMessage();
            
        }

        
    }



    public function getConexion(){
        if ($this->cn == null) {
            echo "No se puede realizar la conexion";
            exit();
        }else{
            return $this->cn;
        }

    }

    public function closeConexion(){
        $this->cn = null;
    }

    


}






?>