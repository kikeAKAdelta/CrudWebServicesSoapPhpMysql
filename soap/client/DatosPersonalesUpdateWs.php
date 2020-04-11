<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../../source/estilo.css">

</head>
<body>
    <?php
    $nombre=''; $apellido=''; $edad='';$id='';$result='';

    //Obtenemos el id del cual se desea actualizar los datos y luego 
    //hacemos una peticion soap para obtener los datos y poder editarlos
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $options = array(
            'uri' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php',
            'location' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php'
            
        );
        
        $client = new SoapClient(null, $options);
        
        require_once("../../controller/DatosPersonalesController.php");
        
        $result = ($client->getDatosPersonalesFiltro($id));
    
        foreach ($result as $datos) {
                $id = $datos->id;
                $nombre = $datos->nombre;
                $apellido = $datos->apellido;
                $edad = $datos->edad;
            }
    }
    
    ?>

    <h1>Actualizacion de Datos</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label for="">Id:</label>
        <input type="text" id="id" name="id" value="<?php echo $id; ?>"><br>

        <label for="">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br>

        <label for="">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" ><br>

        <label for="">Edad:</label>
        <input type="text" id="edad" name="edad"  value="<?php echo $edad; ?>"><br>

        <input type="submit" value="Actualizar" id="actualizar" name="actualizar">

    </form>

    <div>
        <a href="DatosPersonalesClientWs.php">Regresar</a>
    </div>

    <?php

    //Una vez se envian los datos actualizados desde el formulario se persisten en la bd
    
    if (isset($_POST['actualizar'])) {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        
        if (empty($id) && empty($nombre) && empty($apellido) && empty($edad)) {
            echo "Por favor rellene los campos";
        }else{

            $options = array(
                'uri' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php',
                'location' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php'
            );
        
            $client = new SoapClient(null, $options);

            require("../../controller/DatosPersonalesController.php");
        
            $result = ($client->updateDatosPersonales($id, $nombre, $apellido, $edad));
        
            echo $result;
        }
    }
    
    
    
    ?>

</body>
</html>