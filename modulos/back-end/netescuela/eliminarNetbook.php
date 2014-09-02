<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");		
include_once($docRootSitio."utiles/ctrlAcceso.php");	

if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
		exit();	
	}

if($_POST['Netbook']){	
	include_once($docRootSitio."modelo/Netbook.php");		

	$net1 = new Netbook();	
	$delete = $net1->eliminarNetbook($_POST['Netbook']);
	
	header("location: listarNetbooks.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
	exit();	
}
?>