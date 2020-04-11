

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
    <link rel="stylesheet" href="../../source/estilo.css">
</head>
<body>
    <h1>Agregar Nuevo Usuario</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <input type="text" placeholder="Introduce el Id" name="id" id="id"><br>
        
        <input type="text" placeholder="Introduce el nombre" name="nombre" id="nombre"><br>
        
        <input type="text" placeholder="Introduce el apellido" name="apellido" id="apellido">
        <br>

        <input type="text" placeholder="Introduce la edad" name="edad" id="edad">
        <br>

        <input type="submit" value="Crear" name="enviar" id="enviar">
        
    </form>
    <div class="botones">
        <a href="DatosPersonalesClientWs.php">Regresar</a>
    </div>
    




<?php

$options = array(
    'uri' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php',
    'location' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php'
);

if (isset($_POST['enviar'])) {

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];


if (empty($id) && empty($nombre) && empty($apellido) && empty($edad)) {
    echo "Por favor rellene los campos";
}else{

    $client = new SoapClient(null, $options);

require("../../controller/DatosPersonalesController.php");

$result = ($client->createDatosPersonales($id, $nombre, $apellido, $edad));

echo $result;


}
}





?>
</body>
</html>