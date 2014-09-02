<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");		
include_once($docRootSitio."utiles/ctrlAcceso.php");	

if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta pagina.<h2>";
		exit();	
	}

if($_POST['DatosEscuela']){	
	include_once($docRootSitio."modelo/DatosEscuela.php");		

	$datos = new DatosEscuela();	
	$delete = $datos->eliminarDatosEscuela($_POST['DatosEscuela']);
	
	header("location: listarDatosEscuelas.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta pagina.<h2>";
	exit();	
}
?>