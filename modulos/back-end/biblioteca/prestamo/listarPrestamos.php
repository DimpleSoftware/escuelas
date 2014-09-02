<?php 
include_once("../../headerAdmin.php");	
include_once($docRootSitio."modelo/Prestamo.php");
include_once($docRootSitio."modelo/Alumno.php");
include_once($docRootSitio."modelo/Curso.php");

$pre1 = new Prestamo();
$alu1 = new Alumno();
$cur1 = new Curso();

$_prestamos = $pre1->listarPrestamosSinDevolver();
?>
<?php
#Paginación	
	$limit=5;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	if($_POST['bandera'] && $_POST['busqueda']!=""){	
		$_GET = null;
		$_prestamos = $pre1->buscarPrestamos($offset,$limit,$campoOrder,$order,$_POST['busqueda'],$_POST['campoBusqueda']);	
	}
	else{
		$_prestamos = $pre1->listarPrestamosSinDevolver($offset,$limit,$campoOrder,$order);	
	}
	#getCantRegistros
	$cantRegistros = $pre1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit); 
	
		if($_POST['campoBusqueda']){
		$campoBusqueda['nombre'] = $_POST['campoBusqueda'];
		$campoBusqueda['descripcion'] = ucfirst($_POST['campoBusqueda']);
	}
	else{
		$campoBusqueda['nombre'] = "apellido";
		$campoBusqueda['descripcion'] = "Apellido";
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
          <h2><span>Listado De Prestamos</span></h2>
          <p>
		  <div style="border:0px solid #ccc;height:40px;width:500px;float:left;">		
		<form method="post" style="margin:0px;padding:0px;width:550px;height:40px;">				
		<input type="hidden" name="bandera" value="1" />					
		<input type="text" name="busqueda" value="<?php echo $_POST['busqueda']?>" style="width:150px;height:25px;float:left;margin:0px;padding:5px;font-size:16px;"/>			
		<select name="campoBusqueda" style="margin:0px;padding:0px;width:120px;height:37px;float:left;">
			<option selected value=""></option>			
			<option value="alumno" >Nombre Alumno</option>
			<option value="libroNombre" >Nombre Libro</option>
		</select>
		<input type="submit" value="Buscar" style="float:left;margin:0px 0px 0px 2px;height:34px;width:95px;font-size:14px;"/>
		</form>
	</div>
	
	<div style="clear:both;"></div>		
	<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>El Prestamos Se Agrego Exitosamente.</h4>
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

<form method="post" id="formTrabajo" name="formTrabajo">

</form>
<div id ="profesores"></div>
<?php	

if(count($_prestamos)){?>	
	<fieldset>
	<legend>Detalle Prestamos</legend>
		<table id="mytable" cellspacing="0" cellpadding="0">
			<tr>
				<th class="specalt">
				<a href="listarPrestamos.php?campoOrder=nombre&order=<?php echo $order?>">	
				Nombre Alumno
				</a>
				</th>
				<th>
					Curso Alumno
				</th>
				<th>
					Nombre Libro
				</th>
				<th>
					Fecha Prestamo
				</th>
				<th>
					Fecha Devolucion
				</th>
				<th>
					Acciones
				</th>
			</tr>
		
		<?php for($i=1;$i<=count($_prestamos);$i++){	
		$_nombre = $alu1->listarAlumno($_prestamos[$i]['nombreAlumno']);
		$_curso = $cur1->listarCurso($_prestamos[$i]['cursoAlumno']);
			if($i%2==0){
					$class="class='alt'";
					$classTh="class='specalt'";
				}
				else{
					$class="";
					$classTh="class='spec'";
				}
			?>		
		<tr>
		
			<tr>
				<th <?php echo $classTh?> >
					<center><?php echo $_nombre['nombre']?></center>
				</th>
				<td <?php echo $class?>>
					<center><?php echo $_curso['nombre']?></center>
				</td>
				<td <?php echo $class?>>
					<center><?php echo $_prestamos[$i]['libroNombre']?></center>					
				</td>
					<td <?php echo $class?>>
					<center><?php echo $_prestamos[$i]['prestamo']?></center>					
				</td>
					<td <?php echo $class?>>
					<center><?php echo $_prestamos[$i]['devolucion']?></center>					
				</td>
				
				<td <?php echo $class?>>
				<div id="celdaAcciones">
					<form method="post" action="devolverLibro.php">
						<input type="hidden" name="Libro" value="<?php echo $_prestamos[$i]['idLibro']?>">
						<input type="submit" value="Devolver" style="width:70px;">
					</form>
				</div>
				
				</td>
			</tr>			
			<?php }?>
		</table>
	</fieldset>
	<div id="paginacion">
	<?php 					
	if(!is_numeric($_GET['pagina']) || $_GET['pagina']<=1){		
	 	$_GET['pagina'] = 1;				
	}
	else{		
		$paginaAnterior=$_GET['pagina']-1;
		
		if(isset($_GET['campoOrder']) && isset($_GET['order'])){
			$campoOrder = $_GET['campoOrder'];+
			$order = $_GET['order'];
			$criteriosOrder = "&campoOrder=$campoOrder&order=$order";
		}
		?>			
		<a href="listarPrestamos.php?pagina=<?php echo $paginaAnterior?><?php echo $criteriosOrder?>">Anterior</a>	
	<?php }?>
	
	Pagina <?php echo $_GET['pagina']?>/<?php echo $cantPaginas?> de <?php echo $cantRegistros?> registros
	
	<?php if($_GET['pagina']<$cantPaginas){
		$paginaSiguiente=$_GET['pagina']+1;
		
		if(isset($_GET['campoOrder']) && isset($_GET['order'])){
			$campoOrder = $_GET['campoOrder'];+
			$order = $_GET['order'];
			$criteriosOrder = "&campoOrder=$campoOrder&order=$order";
		}
				
	?>		
		
		<a href="listarPrestamos.php?pagina=<?php echo $paginaSiguiente?><?php echo $criteriosOrder?>">Siguiente</a>	
		
	<?php }?>	
	</div>
	
	<?php }
	else{?>
		<h3>No existen Libros Cargados.</h3>
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