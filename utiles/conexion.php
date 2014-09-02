<?php
#datos de conexión
$host = "localhost";
$usuarioDb = "root";
$claveDb = "root";
$db = "escuelas";

#conexión
include_once($docRootSitio."modelo/Conector.php");
$c1 = new Conector($host,$usuarioDb,$claveDb,$db);
$c1->conectar();

?>
