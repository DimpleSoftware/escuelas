<?php include_once("../../headerAdmin.php");
include_once($docRootSitio."modelo/Libro.php");		
include_once($docRootSitio."modelo/EstadoLibro.php");

	$lib1 = new Libro();			
	$etl1 = new EstadoLibro();
	
	$_libro = $lib1->listarLibro($_POST['Libro']);
	$_estados = $etl1->listarEstadoLibros();
	
	#nombre
	if($_POST['nombre']){
		$nombre = $_POST['nombre'];
	}
	else{		
		$nombre = $_libro['nombre'];
	}
		
	#autor 
	if($_POST['autor ']){
		$autor  = $_POST['autor '];
	}
	else{
		$autor  = $_libro['autor'];
	}
	
	#estante 
	if($_POST['estante']){
		$estante  = $_POST['estante'];
	}
	else{
		$estante  = $_libro['estante'];
	}

	#editorial
	if($_POST['editorial']){
		$editorial = $_POST['editorial'];
	}
	else{
		$editorial = $_libro['editorial'];
	}
	
	#preview
	if($_POST['preview']){
		$preview = $_POST['preview'];
	}
	else{
		$preview = $_libro['preview'];
	}
	
	#estado
	if($_POST['estado']){
		$_estado = $etl1->listarEstadoLibro($_POST['estado']);
	}
	else{
		if($_libro['estado']!=0){
			$_estado = $etl1->listarEstadoLibro($_libro['estado']);
		}
		else{
			$_estado['nombre'] = "Elija un estado para el libro";
		}
	}
	
	#paginas
	if($_POST['paginas']){
		$paginas = $_POST['paginas'];
	}
	else{
		$paginas = $_libro['paginas'];
	}
	
	
	#bandera
	if($_POST["bandera"]){		
	
		$mensaje = $lib1->validarLibro($_POST);
		
		if(!$mensaje){						
			$update = $lib1->modificarLibro();		
			header("location: listarLibros.php?update=1"); 	
			exit();	
			
		}	
}		
		
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
          <h2><span>Modificar Libro</span></h2>
          <p>
		  <form enctype="multipart/form-data" method="post">	
		<fieldset>
		<legend> Informaci&oacute;n del Libro</legend>	
	
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>
		
		<!--Administrador-->
		<input type="hidden" name="Libro" value="<?php echo $lib1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $lib1->getId()?>" />		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />
		<!--Foto-->
		<label>Foto:</label>
		<div style="margin-left:0px;font-size:10pt;padding:2px;width:50px;height:40px;"><img alt="Imagen" name="preview" style="margin-left:62px;border:1px solid #000000;" src="<?php echo $preview?>" height="228" width="228"></div><br><br><br><br><br><br><br><br><br><br><br><br>
		<!--nombre-->
		<label>Nombre: *</label> <input type="text" style="width:225px;height:18px;margin-left:1px;" name="nombre" value="<?php echo $nombre?>" /> <br />
		<!--Autor-->
		<label>Autor: *</label> <input type="text" style="width:225px;height:18px;margin-left:15px;" name="autor" value="<?php echo $autor?>" /> <br />
		<!--estante -->
		<label>Estante : *</label> <input type="text" style="width:225px;height:18px;margin-left:0px;" name="estante" value="<?php echo $estante?>" /> <br />
		<!--editorial-->
		<label>Editorial: *</label> <input type="text" style="width:225px;height:18px;margin-left:0px;" name="editorial" value="<?php echo $editorial?>" /> <br />
		<!--paginas-->
		<label>Paginas: *</label> <input type="text" style="width:225px	;height:18px;margin-left:2px;" name="paginas" value="<?php echo $paginas?>" /> <br />
		<!--Estado-->		
		<label> Estado: *</label>
			<select name="estado" style="width:231px;height:25px;margin-left:8px;" >
					<option selected value="<?php echo $_estado['id']?>"><?php echo $_estado['nombre']?></option>
					<?php for($i=1;$i<=count($_estados);$i++){?>
						<option value="<?php echo $_estados[$i]['id']?>"><?php echo $_estados[$i]['nombre']?></option>
					<?php }?>
			</select> <br /><br />			
		<!--submit-->
		<center><input type="submit" value="Modificar"> * Campos obligatorios</center>
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