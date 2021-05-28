<h1>Pacientes</h1>
<?php
// ini_set("display_errors",true);
require_once('/var/www/html/nusoap/lib/nusoap.php');
print("Hola Mundo");
$params = array('run' =>"12449275");
$client = new \soapclient('http://172.25.16.18/bus/webservice/ws.php?wsdl');
$response = $client->call('buscarDetallePersona', $params);

var_dump($response);


?>