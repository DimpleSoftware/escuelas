<?php
session_start();
if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta p&aacute;gina.<h2>";
		exit();	
	}

if($_POST['Administrador']){
	include_once("../../../utiles/principal.php");		
	include_once($docRootSitio."modelo/Administrador.php");		

	$ad1 = new Administrador();	
	$delete = $ad1->eliminarAdministrador($_POST['Administrador']);
	
	header("location: listarAdministradores.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
	exit();	
}
?>