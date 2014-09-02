<?php 
	include_once("../../headerAdmin.php");
	include_once($docRootSitio."modelo/Libro.php");		
	include_once($docRootSitio."modelo/EstadoLibro.php");
	
	$lib1 = new Libro();
	$etl1 = new EstadoLibro();	

	$_libro = $lib1->listarLibro($_POST['Libro']);
	$_estado = $etl1->listarEstadoLibro($_libro['estado']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sistema</title>
<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $httpHostSitio?>css/css/main.css" />
<link rel="stylesheet" media="print" type="text/css" href="<?php echo $httpHostSitio?>css/css/print.css" />
<link rel="stylesheet" media="aural" type="text/css" href="<?php echo $httpHostSitio?>css/css/aural.css" />	
</head>
<body id="www-url-cz">
<div id="main" class="box">
  <div id="header">
    <h1 id="logo"><a href="http://www.free-css.com/">Sistema<strong></strong><span></span></a></h1>
    <hr class="noscreen" />
    <div class="noscreen noprint">
     <hr />
    </div>
    <div id="search" class="noprint">
      <form action="http://www.free-css.com/" method="get">
   
      </form>
    </div>
  </div>
  <div id="tabs" class="noprint">
    <h3 class="noscreen">Navigation</h3>
    <ul class="box">
      <li><a href="/Escuela/modulos/back-end/biblioteca/libros/agregarLibro.php">Agregar Libro<span class="tab-l"></span><span class="tab-r"></span></a></li>
      <li><a href="/Escuela/modulos/back-end/biblioteca/libros/listarLibros.php">Listar Libros<span class="tab-l"></span><span class="tab-r"></span></a></li>
      <li><a href="/Escuela/modulos/back-end/biblioteca/menuBiblioteca.php">Volver Menu Biblioteca<span class="tab-l"></span><span class="tab-r"></span></a></li>
      <li><a href="/Escuela/utiles/ctrlLogout.php">Salir<span class="tab-l"></span><span class="tab-r"></span></a></li>
     </ul>
    <hr class="noscreen" />
  </div>
  <div id="page" class="box">
    <div id="page-in" class="box">
     
      <div id="content">
        <div class="article">
          <h2><span>Detalle Libro</span></h2>
          <p>
		  <form enctype="multipart/form-data" action="listarLibros.php" method="post">	
		<fieldset>
		<legend> Informaci&oacute;n del Libro</legend>	
		
		<!--Foto-->
		<label>Foto: *</label>
		<div style="margin-left:0px;font-size:10pt;padding:2px;width:50px;height:40px;"><img alt="Imagen" name="preview" style="margin-left:96px;border:1px solid #000000;" src="<?php echo $_libro['preview']?>" height="228" width="228"></div><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<!--nombre-->
		<label>Nombre Libro: *</label> <input type="text" style="width:225px;height:18px;margin-left:1px;" name="nombre" readonly="readonly();" value="<?php echo $_libro['nombre']?>" /> <br />
		
		<!--Autor-->
		<label>Autor: *</label> <input type="text" style="width:225px;height:18px;margin-left:47px;" name="autor" readonly="readonly();" value="<?php echo $_libro['autor']?>" /> <br />
		
		<!--Estante-->
		<label>Estante: *</label> <input type="text" style="width:225px;height:18px;margin-left:36px;" name="estante" readonly="readonly();" value="<?php echo $_libro['estante']?>" /> <br />
		
		<!--Editorial-->
		<label>Editorial: *</label> <input type="text" style="width:225px;height:18px;margin-left:32px;" name="editorial" readonly="readonly();" value="<?php echo $_libro['editorial']?>" /> <br />
		
		<!--paginas-->
		<label>Paginas: *</label> <input type="text" style="width:225px;height:18px;margin-left:34px;" name="paginas" readonly="readonly();" value="<?php echo $_libro['paginas']?>" /> <br />
	
		<!--Estado-->
		<label>Estado: *</label> <input type="text" style="width:225px;height:18px;margin-left:40px;" name="estado" readonly="readonly();" value="<?php echo $_estado['nombre']?>" /> <br /><br />
		
		<!--submit-->
		<center><input type="submit" value="Volver"></center>
		
		</fieldset>	
		</form>				
		</p>
        
        </div>
     </div>
      <div id="col" class="noprint">
        <div id="col-in">
          <h3><span>Quienes Somos</span></h3>
          <div id="about-me">
            <p><img src="../../../../css/design/tmp_photo.gif" id="me" alt="Ese Soy Yo!!!" /> <strong>Leandro Rebolloso</strong><br />
              Edad: 30<br />
              San Rafael, Mza<br /></p>
             
          </div>
		  <div id="about-me">
            <p><img src="../../../../css/design/tmp_photo.gif" id="me" alt="Ese Soy Yo!!!" /> <strong>Pablo Gonzalez</strong><br />
              Edad: 31<br />
              San Rafael, Mza<br /></p>
              
          </div>
          </div>
      </div>
    </div>
  </div>
  <div id="footer">
    <div id="top" class="noprint">
     </div>
    <hr class="noscreen" />
   </div>
</div>
</body>
</html>