<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");		
include_once($docRootSitio."utiles/ctrlAcceso.php");	

if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
		exit();	
	}

if($_POST['Curso']){	
	include_once($docRootSitio."modelo/Curso.php");		

	$cur1 = new Curso();	
	$delete = $cur1->eliminarCurso($_POST['Curso']);
	
	header("location: listarCursos.php?delete=$delete"); 	
	exit();
}
else{
	echo "<h2>No tienes permisos para ingresar a esta página.<h2>";
	exit();	
}
?>