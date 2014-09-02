<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="OpenOffice.org 3.2  (Linux)">
	<META NAME="AUTHOR" CONTENT="symfony ">
	<META NAME="CREATED" CONTENT="20140824;2524000">
	<META NAME="CHANGEDBY" CONTENT="symfony ">
	<META NAME="CHANGED" CONTENT="20140824;4570700">
	<META NAME="CHANGEDBY" CONTENT="symfony ">
	<STYLE TYPE="text/css">
	<!--
		@page { margin: 2cm }
		P { margin-bottom: 0.21cm }
		TD P { margin-bottom: 0cm }
	-->
	</STYLE>
</HEAD>



<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");

	include_once($docRootSitio."modelo/Alumno.php");	
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Marca.php");
	

	$datosesc = new DatosEscuela();

$_datos = $datosesc->listarDatosEscuela($_POST['datosEscuela']);
$alumno = new Alumno();
$_alumnos = $alumno->listarAlumnoCuil($_POST['cuilAlumno']);


$mar1 = new Marca();
$_marcas = $mar1->listarMarca($_alumnos['MarcaNetbook']);



?>

<BODY LANG="es-AR" DIR="LTR">
<P STYLE="margin-bottom: 0cm"><FONT FACE="Liberation Serif, serif"><FONT SIZE=4 STYLE="font-size: 16pt">El/La
director/a de la escuela N°...........<B>deja constancia</B> por la
presente que <B>deslinda de toda responsabilidad</B>,sobre la
netbook<b> <?php  echo $_marcas['nombre'];?></b> N° de serie: <b><?php echo $_alumnos['numSerie'];?></b> al Sr. Director de la Escuela
N°<b> <?php echo $_datos['numeroEscuela'];?></b> ,<b><?php echo $_datos['nombreEscuela'];?></b>,dado que a partir de la fecha
<b><?php echo date("d");?></b> del mes de <b><?php echo date("F");?></b> de <b><?php echo date("Y");?></b>, la misma migra a
esta escuela, a nombre del alumno <b><?php echo $_alumnos['nombre'];?></b> , CUIL: <b><?php echo $_alumnos['cuil'];?></b>.</FONT></FONT></P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<TABLE WIDTH=100% CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=128*>
	<COL WIDTH=128*>
	<TR VALIGN=TOP>
		<TD WIDTH=50% STYLE="border: none; padding: 0cm">
			<P ALIGN=CENTER STYLE="border: none; padding: 0cm">…<FONT FACE="Liberation Serif, serif"><FONT SIZE=4 STYLE="font-size: 16pt">....................................</FONT></FONT></P>
		</TD>
		<TD WIDTH=50% STYLE="; border: none; padding: 0cm">
			<P ALIGN=CENTER>…<FONT FACE="Liberation Serif, serif"><FONT SIZE=4 STYLE="font-size: 16pt">............................................</FONT></FONT></P>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD WIDTH=50% STYLE="; border: none; padding: 0cm">
			<P ALIGN=CENTER><FONT FACE="Liberation Serif, serif"><FONT SIZE=4 STYLE="font-size: 16pt"><B>Sello
			Escuela</B></FONT></FONT></P>
		</TD>
		<TD WIDTH=50% STYLE="; border: none; padding: 0cm">
			<P ALIGN=CENTER><FONT FACE="Liberation Serif, serif"><FONT SIZE=4 STYLE="font-size: 16pt">F<B>irma
			y Sello Director</B></FONT></FONT></P>
		</TD>
	</TR>
</TABLE>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</BODY>
</HTML>