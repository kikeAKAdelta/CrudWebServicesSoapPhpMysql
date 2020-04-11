<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="../../source/estilo.css">

</head>
<body>

<h1>Datos Personales De los  Clientes</h1>

<?php

$options = array(
    'uri' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php',
    'location' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php'
    
);

$client = new SoapClient(null, $options);

require_once("../../controller/DatosPersonalesController.php");

$result = ($client->getDatosPersonales());
        
    
    echo "<table><tr><th>Id</th>  <th>Nombre</th> <th>Apellido</th> <th>Edad</th><th>Opciones</th></tr>"
    ;
    
    foreach ($result as $usuario) { //verifica si hay filas
        echo "<tr>" . 
         "<td>" . $usuario->id . "</td>" .
         "<td>" . $usuario->nombre . "</td> " .
         "<td>" . $usuario->apellido . "</td> " .
         "<td>" . $usuario->edad . "</td> " .
         "<td><a href='DatosPersonalesDeleteWs.php?id=". $usuario->id ."' > Delete</a>
         <a href='DatosPersonalesUpdateWs.php?id=". $usuario->id ."' > Update</a></td>".
         "</tr>" .
         "";
    }
    

    echo "</table>";
    
?>

<div class="botones">
<a href='CreateDatosPersonalesClientWs.php'>Crear</a>
</div>


    
</body>
</html>




