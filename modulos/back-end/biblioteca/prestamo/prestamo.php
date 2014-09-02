<?php 
include_once("../../headerAdmin.php");	
include_once($docRootSitio."modelo/Libro.php");

$lib1 = new Libro();

$_libros = $lib1->listarLibrosDisponibles();

if($_POST["bandera"]){	

include_once($docRootSitio."modelo/Prestamo.php");
include_once($docRootSitio."modelo/Alumno.php");

$alu1 = new Alumno();
$pre1 = new Prestamo();

$nombreLibro = $_POST['alumno'];
$_alumno = $alu1->listarAlumno($nombreLibro);

$pre1->setNombreAlumno($_POST['alumno']); //anda
$pre1->setNombre($_alumno['nombre']);
$pre1->setCurso($_alumno['curso']);//anda
$pre1->setNombreLibro($_POST['nombreLib']);//anda
$pre1->setFechaPrestamo($_POST['fecha']);//anda
$pre1->setFechaDevolucion($_POST['nuevafecha']);//anda	
$pre1->setIdLibro($_POST['idlibro']);

$mensaje = $pre1->validarPrestamo($_POST);
		if(!$mensaje){						
			$lib1->modificarEstadoLibro($_POST['idlibro']);
			$pre1->agregarPrestamo();
			header("location: Prestamo.php?insert=1"); 	
			exit();		
		}		
	}
		
?>
<script src="<?php echo $httpHostSitio?>js/nuevoAjax.js" type="text/javascript"></script>	
<script src="<?php echo $httpHostSitio?>js/tecnico.js" type="text/javascript"></script>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  

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
      <li><a href="/Escuela/modulos/back-end/biblioteca/prestamo/prestamo.php">Prestar Libro<span class="tab-l"></span><span class="tab-r"></span></a></li>
      <li><a href="/Escuela/modulos/back-end/biblioteca/prestamo/listarPrestamos.php">Listado Prestamos<span class="tab-l"></span><span class="tab-r"></span></a></li>
      <li><a href="/Escuela/modulos/back-end/biblioteca/menuBiblioteca.php">Volver Menu Biblioteca<span class="tab-l"></span><span class="tab-r"></span></a></li>
      <li><a href="/Escuela/utiles/ctrlLogout.php">Salir<span class="tab-l"></span><span class="tab-r"></span></a></li>
     </ul>
    <hr class="noscreen" />
  </div>
  <div id="page" class="box">
    <div id="page-in" class="box">
     
      <div id="content">
        <div class="article">
          <h2><span>Prestamo De Libros</span></h2>
          <p>
		 	<div id="resAcciones">
				<?php if($_GET['insert']==1){?>
				<h4>El Prestamo Se Agrego Exitosamente.</h4>
				<?php }?>
			</div>	
			<?php
				if(!isset($_GET['order']) || $_GET['order']=="DESC"){
				$order = "ASC";
				}
				else{
				$order = "DESC";
				}		
			?>
			
			<form method="post" id="formLibro" name="formLibro">
<fieldset>
		<legend>Seleccione El Libro</legend>
			<label> Seleccione Libro: </label>
			<select name="libro" onchange="Libro();" >
					<option selected value="<?php echo $_libro['id']?>"><?php echo $_libros['nombre']?></option>
					<?php for($i=1;$i<=count($_libros);$i++){?>
						<option value="<?php echo $_libros[$i]['id']?>"><?php echo $_libros[$i]['nombre']?></option>
					<?php }?>
	
			</select> <br />
</fieldset>	
</form>
<div id ="libros"></div>
<?php	
if(count($_libros)){?>	
	
<?php }
	else{?>
		<h3>No existen Prestamos Cargados.</h3>
	<?php }?>
			
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