<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");		
include_once($docRootSitio."utiles/ctrlAcceso.php");	

if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
		exit();	
	}

if($_POST['Alumno']){	
	include_once($docRootSitio."modelo/Alumno.php");		

	$alu1 = new Alumno();	
	$delete = $alu1->eliminarAlumno($_POST['Alumno']);
	
	header("location: listarAlumnos.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
	exit();	
}
?>