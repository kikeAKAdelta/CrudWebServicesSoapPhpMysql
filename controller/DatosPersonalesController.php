<?php

require("../../model/Conexion.php");
require("../../credenciales/Credenciales.php");



class DatosPersonalesController{

    private $conexion;
    private $resultSet;
    

    public function getDatosPersonales(){
        

        $sql = "SELECT id, nombre, apellido, edad FROM DATOSPERSONALES";

        $credenciales = new Credenciales();

        $bd = $credenciales->getBd();
        $host = $credenciales->getHost();
        $password = $credenciales->getPassword();
        $usuario = $credenciales->getUsuario();

        $cn = new Conexion($host,$usuario,$password,$bd);
        

        $this->conexion = $cn->getConexion();

        $miConsulta = $this->conexion->prepare($sql);
        $miConsulta->execute(); 
        
        $this->resultSet = $miConsulta->fetchAll(PDO::FETCH_OBJ);
        $cn->closeConexion();
          
        return $this->resultSet;
  
        
    }

    public function getDatosPersonalesFiltro($id){
        

        $sql = "SELECT id, nombre, apellido, edad FROM DATOSPERSONALES WHERE id = ?";

        $credenciales = new Credenciales();

        $bd = $credenciales->getBd();
        $host = $credenciales->getHost();
        $password = $credenciales->getPassword();
        $usuario = $credenciales->getUsuario();

        $cn = new Conexion($host,$usuario,$password,$bd);
        

        $this->conexion = $cn->getConexion();

        $miConsulta = $this->conexion->prepare($sql);
        $miConsulta->execute(Array($id)); 
        
        $this->resultSet = $miConsulta->fetchAll(PDO::FETCH_OBJ);
        $cn->closeConexion();
          
        return $this->resultSet;
  
        
    }

    

    public function createDatosPersonales($id, $nombre, $apellido, $edad){

        $sql = "INSERT INTO datospersonales (id, nombre, apellido, edad) VALUES(?,?,?,?)";

        $credenciales = new Credenciales();

        

        $bd = $credenciales->getBd();
        $host = $credenciales->getHost();
        $password = $credenciales->getPassword();
        $usuario = $credenciales->getUsuario();

        $cn = new Conexion($host,$usuario,$password,$bd);
        
        $this->conexion = $cn->getConexion();

        $consultaSql = $this->conexion->prepare($sql);

        try {
            $consultaSql->execute(
                Array(
                    $id,
                    $nombre,
                    $apellido,
                    $edad
                )
            );
            $this->resultSet= "Datos Insertados con exito!!";
        } catch (PDOException $e) {
              $this->resultSet= $e->getMessage();  
        }  
        
        return $this->resultSet;

    }

    public function updateDatosPersonales($id, $nombre, $apellido, $edad){

        $sql = "UPDATE datospersonales SET nombre = '" . $nombre . "', apellido = '" . $apellido . "', edad = '" . $edad . "' WHERE id = '" . $id ."'";

        $credenciales = new Credenciales();

        

        $bd = $credenciales->getBd();
        $host = $credenciales->getHost();
        $password = $credenciales->getPassword();
        $usuario = $credenciales->getUsuario();

        $cn = new Conexion($host,$usuario,$password,$bd);
        
        $this->conexion = $cn->getConexion();

        $consultaSql = $this->conexion->prepare($sql);

        try {
            $consultaSql->execute();
            $this->resultSet= "Datos actualizados con exito!!";
        } catch (PDOException $e) {
              $this->resultSet= $e->getMessage();  
        }  
        
        return $this->resultSet;

    }

    public function deleteDatosPersonales($id){

        $sql = 'DELETE FROM DATOSPERSONALES WHERE id = ?';

        $credenciales = new Credenciales();
        

        $bd = $credenciales->getBd();
        $host = $credenciales->getHost();
        $password = $credenciales->getPassword();
        $usuario = $credenciales->getUsuario();

        $cn = new Conexion($host,$usuario,$password,$bd);
        
        $this->conexion = $cn->getConexion();

        $consultaSql = $this->conexion->prepare($sql);

        $consultaSql->execute(Array($id));

        return "Registro Eliminado";

    }





}




?>