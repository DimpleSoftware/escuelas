<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");		
include_once($docRootSitio."utiles/ctrlAcceso.php");	

if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
		exit();	
	}

if($_POST['Marca']){	
	include_once($docRootSitio."modelo/Marca.php");		

	$mar1 = new Marca();	
	$delete = $mar1->eliminarMarca($_POST['Marca']);
	
	header("location: listarMarcas.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
	exit();	
}
?>