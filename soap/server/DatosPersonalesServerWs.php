<?php

include("../../controller/DatosPersonalesController.php");
//include("../client/DatosPersonalesServerWs.php");



$options = array(
    'uri' => 'http://localhost/webServicesSoapPhp/versionamiento/crudWebServicesSoapPhp/soap/server/DatosPersonalesServerWs.php'
    , 'soap_version'   => SOAP_1_2
);


//server

$server = new SoapServer(null, $options);


$datosPersonalesController = new DatosPersonalesController();

$server-> setObject($datosPersonalesController);

$server->handle();



?>