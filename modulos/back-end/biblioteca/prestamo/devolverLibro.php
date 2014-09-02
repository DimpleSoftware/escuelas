<?php
session_start();

if($_POST['Libro']){

	include_once("../../../../utiles/principal.php");		
	include_once($docRootSitio."modelo/Libro.php");		
	include_once($docRootSitio."modelo/Prestamo.php");		

	$lib1 = new Libro();	
	$pre1 = new Prestamo();	
	
	$pre1->modificarEstadoPrestamo($_POST['Libro']);
	$lib1->modificarEstadoDevolucion($_POST['Libro']);
	
	header("location: listarPrestamos.php"); 	
	
}

?>