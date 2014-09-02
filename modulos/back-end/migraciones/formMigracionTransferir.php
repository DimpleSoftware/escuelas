<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">


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

//echo $_marcas['id'];

//echo $_POST['MarcaNetbook'];
//for($i=1;$i<=count($_marcas);$i++){
//echo $_marcas[$i]['id'];
//echo $_marcas[$i]['nombre'];
	//				} ?>


<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="OpenOffice.org 3.2  (Linux)">
	<META NAME="AUTHOR" CONTENT="WinuE">
	<META NAME="CREATED" CONTENT="20140313;10400000">
	<META NAME="CHANGEDBY" CONTENT="symfony ">
	<META NAME="CHANGED" CONTENT="20140730;14463500">
	<META NAME="Info 1" CONTENT="">
	<META NAME="Info 2" CONTENT="">
	<META NAME="Info 3" CONTENT="">
	<META NAME="Info 4" CONTENT="">
	<STYLE TYPE="text/css">
	<!--
		@page { margin-right: 3cm; margin-top: 2.5cm; margin-bottom: 2.5cm }
		P { margin-bottom: 0.21cm; direction: ltr; color: #000000; widows: 2; orphans: 2 }
		P.western { font-family: "Times New Roman", serif; font-size: 12pt; so-language: es-ES }
		P.cjk { font-family: "Times New Roman", serif; font-size: 12pt }
		P.ctl { font-family: "Times New Roman", serif; font-size: 12pt; so-language: ar-SA }
		A:link { so-language: zxx }
	-->
	</STYLE>
 
	
	 
</HEAD>
<BODY LANG="es-AR" TEXT="#000000" DIR="LTR">
<P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0cm">
<BR>
</P>
<P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0cm">
<B><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"></FONT></FONT></B></P>
<P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0cm">
<B><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"></FONT></FONT></B></P>
<P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0cm">
<TABLE WIDTH=100% CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=256*>
	<TR>
		<TD WIDTH=100% VALIGN=BOTTOM STYLE="border: 1.00pt solid #000000; padding: 0.1cm">
			<P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0cm">
			<BR>
			</P>
			<P LANG="es-ES" CLASS="western" ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=3 STYLE="font-size: 13pt"><B>ACTA
			DE MIGRACIÓN PARA ALUMNOS DE ESCUELAS CUBIERTO POR EL PROGRAMA
			CONECTAR IGUALDAD. JURISDICCIÓN MENDOZA </B></FONT></FONT>
			</P>
		</TD>
	</TR>
</TABLE>
<br><br><br><br>

<P LANG="es-ES" CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0cm">
<B><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"></FONT></FONT></B></P>
<P LANG="es-ES" CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0cm">
<FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">Entre
la autoridad educativa provincial representada por el </FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">Sr/a.
<B><?php echo $_datos['nombreDirector'];?> </B></FONT></FONT>
<FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">DNI Nº<B> <?php echo $_datos['dniDirector'];?></B></FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">
en su carácter de Director de la </FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">Escuela
<B> <?php echo $_datos['nombreEscuela'];?></B> Nº <B> <?php echo $_datos['numeroEscuela'];?></B></FONT></FONT>

<FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"> CUE <B>
 <?php echo $_datos['cueEscuela'];?> </B> </FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">
 Sección de Supervisión <b><?php echo $_datos['seccionEscuela'];?> </b>de la ciudad de San Rafael Provincia de
Mendoza, con </FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">domicilio
</FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">
<b><?php echo $_datos['domicilio'];?></b> en adelante “</FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"><B>EL
CEDENTE</B></FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">”
 y </FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"><B>por
otra parte</B></FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">
el/la Sr./a <b>..............................</b> DNI Nº <b>.........................</b>
</FONT></FONT> 
<FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">
en su carácter de </FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">Director/a
de la Escuela  Nº  </FONT></FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">
<b>.........</b> CUE</B> <b>...............</b> Sección<b>.....</b> de Supervisión
 de la ciudad de <b>..................................................</b> Provincia de Mendoza, con domicilio en <b>...........................................</b> 
  . </FONT></FONT></P><br>
<P LANG="es-ES" CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0cm">
<FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">En
adelante “</FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"><B>EL
RECEPCIONISTA</B></FONT></FONT><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">”,
convienen por la presente acta la migración del/la alumno/a <b><?php echo $_alumnos['nombre'];?></b> CUIL  Nº<b> <?php echo $_alumnos['cuil'];?></b>
comodatario de la netbook modelo <b><?php echo $_marcas['nombre'];?></b> serie Nº <b><?php echo $_alumnos['numSerie'];?></b>, del establecimiento con
director/a CEDENTE al establecimiento con director/a RECEPCIONISTA, a
fin de ser incorporada en la planta de alumnos comodatarios de este
último establecimiento y la registración en el servidor del mismo
para otorgar los correspondientes certificados de seguridad dejando
de estar vinculada al servidor de la institución de origen.</FONT></FONT></P><br>
<P LANG="es-ES" CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0cm">
<FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt"></FONT></FONT></P>
<P LANG="es-ES" CLASS="western" ALIGN=LEFT STYLE="margin-bottom: 0cm">
 <FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 13pt">En
prueba de conformidad se firman tres (3) ejemplares de un mismo tenor
y a un solo efecto, por el CEDENTE y por el RECEPCIONISTA en la
ciudad San Rafael Provincia de Mendoza, a los <b><?php echo date("d");?> </b> días del mes de <b><?php echo date("F");?> </b>  
        de 2014.</FONT></FONT></P>
</BODY>
</HTML>