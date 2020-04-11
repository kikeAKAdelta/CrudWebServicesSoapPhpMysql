<?php

class DatosPersonales{


private $nif;
private $nombre;
private $apellido;
private $edad;




public function setNif($nif){
    $this->nif = $nif;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

public function setApellido($apellido){
    $this->apellido = $apellido;
}

public function setEdad($edad){
    $this->edad = $edad;
}

public function getNif(){
    return $this->nif;
}


public function getNombre(){
    return $this->nonbre;
}

public function getApellido(){
    return $this->apellido;
}

public function getEdad(){
    return $this->edad;
}

}





?>