<?php 

include_once("../../headerAdmin.php");
include_once($docRootSitio."modelo/Alumno.php");
include_once($docRootSitio."modelo/Curso.php");

$alu1 = new Alumno();
$cur1= new Curso();

$nombreLibro = $_POST['alumno'];

$_alumno = $alu1->listarAlumno($nombreLibro);
$_curso = $cur1->listarCurso($_alumno['curso']);

$cursito = $_curso['nombre'];
echo $cursito;
?>
