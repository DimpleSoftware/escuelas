<?php include_once("../../headerAdmin.php");	

include_once($docRootSitio."modelo/Materia.php");
include_once($docRootSitio."modelo/Revista.php");
include_once($docRootSitio."modelo/EstadoLibro.php");

$mat1 = new Materia();
$rev1 = new Revista();
$etl1 = new EstadoLibro();

$_materias = $mat1->listarMaterias();
$_revistas = $rev1->listarRevistas();
$_estados = $etl1->listarEstadoLibros();

 	if($_POST["bandera"]){			
		include_once($docRootSitio."modelo/Libro.php");		
		$lib1 = new Libro();
		
		$mensaje = $lib1->validarLibro($_POST);
		
		$archivo = $_FILES['preview'];
		$nombre1 = $_FILES['preview']['name'];
		
		$ruta1="libros/".$nombre1;
		$tmp_nameI = $_FILES['preview']['tmp_name'];
		
		@copy($tmp_nameI,$ruta1);
		
		include_once($docRootSitio."modelo/resize.php");
	
		$resize = new resize("libros/$nombre1");
			
		$resize->size_width(500);				
		$resize->size_height(350);
		$resize->jpeg_quality(75);
		$resize->save("librosReducido/".$nombre1);
		
		$lib1->setPreview("librosReducido/".$nombre1);
		$lib1->setNombreImagen($nombre1);
				
		if(!$mensaje){						
			$lib1->agregarLibro();		
			header("location: listarLibros.php?insert=1"); 	
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
          <h2><span>Agregar Libro</span></h2>
          <p>	<form enctype="multipart/form-data" method="post">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">
		<fieldset>
		<legend> Informacion del Libro</legend>	
		<?php if($mensaje){?>
		<div id="mensaje" style="color:red;"><?php echo $mensaje?> </div> 
		<?php }?>	
		<!--nombre-->
		<label>Nombre: *</label> <input type="text" name="nombre" style="width:175px;height:18px;;margin-left:10px" value="<?php echo $_POST['nombre']?>" /> <br />
				
		<!--autor-->		
		<label>Autor: * </label> <input type="text" style="width:175px;height:18px;margin-left:24px;" name="autor" value="<?php echo $_POST['autor']?>" /> <br />
		
		<!--estante-->		
		<label>Estante: *</label> <input type="text" style="width:175px;height:18px;margin-left:13px" name="estante" value="<?php echo $_POST['estante']?>" /> <br />
		
		<!--editorial-->		
		<label>Editorial: *</label> <input type="text" style="width:175px;height:18px;margin-left:9px" name="editorial" value="<?php echo $_POST['editorial']?>" /> <br />
		
		<!--preview-->		
		<label>Preview: *</label> <input type="file" style="width:325px;height:25px;margin-left:10px" name="preview" value="<?php echo $_POST['preview']?>" /> <br />
		
		<!--paginas-->		
		<label>Paginas: *</label> <input type="text" style="width:175px;height:18px;margin-left:10px" name="paginas" value="<?php echo $_POST['paginas']?>" /> <br />
		
		<!--Estado-->		
		<label>Estado: *</label> 		
		<select name="estado" style="width:181px;height:25px;margin-left:16px" >
					<option selected value="<?php echo $_estado['id']?>"><?php echo $_estado['nombre']?></option>
					<?php for($i=1;$i<=count($_estados);$i++){?>
						<option value="<?php echo $_estados[$i]['id']?>"><?php echo $_estados[$i]['nombre']?></option>
					<?php }?>
		</select> <br /><br />		
			
		<!--submit-->
		<center><input type="submit" value="Agregar"> * Campos obligatorios</center>
		
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