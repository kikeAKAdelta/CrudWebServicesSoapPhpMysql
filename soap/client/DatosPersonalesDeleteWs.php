<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Usuario</title>
    <link rel="stylesheet" href="../../source/estilo.css">
</head>
<body>
    <?php
    
    $id = $_GET["id"];

    $options = array(
        'uri' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php',
        'location' => 'http://localhost/webServicesSoapPhp/versionamiento/CrudWebServicesSoapPhpMysql/soap/server/DatosPersonalesServerWs.php'
        
    );

    $client = new SoapClient(null, $options);

require_once("../../controller/DatosPersonalesController.php");

$result = ($client->deleteDatosPersonales($id));

echo $result;
  
    ?>

<a href="DatosPersonalesClientWs.php">Regresar</a>
</body>
</html>