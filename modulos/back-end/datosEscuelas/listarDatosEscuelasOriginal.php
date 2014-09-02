<?php include_once("../headerAdmin.php");
	if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta pagina.<h2>";
		exit();	
	}
?>

<?php 	
	
	#Paginacion	
	$limit=25;		
	if(is_numeric($_GET['pagina']) && $_GET['pagina']>=1){				
		$offset = ($_GET['pagina']-1) * $limit;		
	}
	else{
		$offset=0;
	}
	
	#Orden por defecto
	if(!isset($_GET['campoOrder']) && !isset($_GET['order']) ){
		$campoOrder = "nombreEscuela";
		$order = "DESC";
	}
	else{
		$campoOrder = $_GET['campoOrder'];
		$order = $_GET['order'];
	}
	
	#incluyo clases
	include_once($docRootSitio."modelo/DatosEscuela.php");		
	include_once($docRootSitio."modelo/Fecha.php");	
	include_once($docRootSitio."modelo/Rol.php");	
		
	#nuevo objeto
	$datoesc = new DatosEscuela();			
	$fe1 = new Fecha();	
	$rol1 = new Rol();	
		
	$_datos = $datoesc->listarDatosEscuelas($offset,$limit,$campoOrder,$order);	
	
	#getCantMenu
	$cantRegistros = $datoesc->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit); 	
			
?>

<div id="container" >
	<div id="main" >				
	
		<?php include("barraDatosEscuela.php") ?>	
		
	<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>Los datos se agregaron exitosamente.</h4>
		<?php }?>
		
		<?php if($_GET['delete']==1){?>
			<h4>Los datos se eliminaron de la Base de Datos.</h4>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<h4>La escuela se modifico exitosamente.</h4>
		<?php }?>
	</div>
	
	<?php if(count($_datos)){?>		
	
	<table id="mytable" cellspacing="0" cellpadding="0">
			<tr>
				<th class="specalt">
				<a href="listarDatosEscuela.php?campoOrder=numeroEscuela&order=<?php echo $order?>">	
				<center><b>Nombre Director</b></center>
				</a>
				</th>
				<th>
					<center><b>Dni Director</b></center>
				</th>
				<th>
					<center><b>Cuil Director</b></center>
				</th>
				<th>
					<center><b>Numero Escuela</b></center>
				</th>
				<th>
					<center><b>Nombre Escuela</b></center>
				</th>
				<th>
					<center><b>Cue Escuela</b></center>
				</th>
				
				<th>
					<center><b>Seccion Escuela</b></center>
				</th>
				<th>
					<center><b>Domicilio Escuela</b></center>
				</th>
				<th>
					<center><b>Ciudad</b></center>
				</th>
				<th>
					<center><b>Accion</b></center>
				</th>
				
			</tr>
		
		<?php for($i=1;$i<=count($_datos);$i++){	
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
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['nombreDirector']?></a>
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['dniDirector']?> 
				</th>					
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['cuilDirector']?>			
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['numeroEscuela']?>									
				</th>	
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['nombreEscuela']?>									
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['cueEscuela']?>									
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['seccionEscuela']?>									
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['domicilioEscuela']?>									
				</th>
				<th <?php echo $classTh?> >
					<?php echo $_datos[$i]['ciudad']?>									
				</th>
				
				
				<th <?php echo $classTh?> >
					<div id="celdaAcciones">
						<form method="post" action="modificarDatosEscuela.php">
							<input type="hidden" name="DatosEscuela" value="<?php echo $_datos[$i]['id']?>">
							<input type="submit" value="Editar">
						</form>
					</div>
				
				<div id="celdaAcciones">
					<form method="post" action="eliminarDatosEscuela.php">
						<input type="hidden" name="DatosEscuela" value="<?php echo $_datos[$i]['id']?>">
						<input type="submit" value="Eliminar" 
						onclick="return confirm('Est seguro que desea eliminar la escuela <?php echo $_datos[$i]['cueEscuela']?>?');">
					</form>
				</div>
					</a>
				</th>
			</tr>			
			<?php }?>
		</table>
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
		<a href="listarDatosEscuelas.php?pagina=<?php echo $paginaAnterior?><?php echo $criteriosOrder?>">Anterior</a>	
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
		
		<a href="listarDatosEscuelas.php?pagina=<?php echo $paginaSiguiente?><?php echo $criteriosOrder?>">Siguiente</a>	
		
	<?php }?>	
	</div>
	
	<?php }
	else{?>
		<h4>No existen Datos de la escuela en la Base de Datos.</h4>
	<?php }?>
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
