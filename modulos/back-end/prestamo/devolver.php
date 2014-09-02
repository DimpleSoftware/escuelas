<?php
session_start();

if($_POST['nunSerie']){

	include_once("../../../utiles/principal.php");		
	include_once($docRootSitio."modelo/Alumno.php");		
	include_once($docRootSitio."modelo/Netbook.php");	
	include_once($docRootSitio."modelo/Prestamo.php");	

	$alu1 = new Alumno();	
	$net1 = new Netbook();	
	$pre1 = new Prestamo();
	
	$alu1->modificarDevolver($_POST['Nombre']);
	$net1->modificarDevolver($_POST['nunSerie']);
	$pre1->modificarDevolver($_POST['nunSerie']);
	
	header("location: listarPrestamos.php"); 	
	
}
?>