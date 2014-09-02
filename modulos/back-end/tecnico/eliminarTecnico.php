<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");		
include_once($docRootSitio."utiles/ctrlAcceso.php");	

if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
		exit();	
	}

if($_POST['Tecnico']){	
	include_once($docRootSitio."modelo/Tecnico.php");		

	$tec1 = new Tecnico();	
	$delete = $tec1->eliminarTecnico($_POST['Tecnico']);
	
	header("location: listarTecnicos.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
	exit();	
}
?>