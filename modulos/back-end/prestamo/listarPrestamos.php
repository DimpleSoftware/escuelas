<?php include_once("../headerAdmin.php");

	#Paginación	
	$limit=25;		
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
	
	#incluyo clases
	include_once($docRootSitio."modelo/Prestamo.php");	
	include_once($docRootSitio."modelo/Alumno.php");		
	
	#nuevo objeto
	$pre1 = new Prestamo();
	$alu1 = new Alumno();

	$_prestamos = $pre1->listarPrestamos($offset,$limit,$campoOrder,$order);	
	
	#getCantRegistros
	$cantRegistros = $pre1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);
		
?>
<div id="container" >
	<div id="main" >			
		<?php include("barraPrestamo.php") ?>	

		<div style="clear:both;"></div>		
		<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>El Prestamo Se Cargo Exitosamente.</h4>
		<?php }?>
		<?php if($_GET['update']==1){?>
			<h4>El Prestamo Se Modificó Exitosamente.</h4>
		<?php }?>
	</div>	
	<?php
	if(!isset($_GET['order']) || $_GET['order']=="DESC"){
			$order = "ASC";
		}
		else{
			$order = "DESC";
		}		

	if(count($_prestamos)){?>	
		<table id="mytable" cellspacing="0" cellpadding="0">
			<tr>
				<th>					
					<center><b>Numero De Serie</b></center>		
				</th>
				<th>					
					<center><b>Nombre Alumno</b></center>
				</th>
				<th>					
					<center><b>Fecha Prestamo</b></center>		
				</th>
				<th>					
					<center><b>Fecha Devolucion</b></center>			
				</th>
				<th>					
					<center><b>Estado</b></center>			
				</th>
				<th>					
					<center><b>Curso</b></center>	
				</th>
				<th>										
					<center><b>Acciones</b></center>
				</th>
			</tr>	
		
		<?php for($i=1;$i<=count($_prestamos);$i++){			
		$_nombre = $alu1->listarAlumno($_prestamos[$i]['nombre']);
			if($i%2==0){
					$class="class='alt'";
					$classTh="class='specalt'";
				}
				else{
					$class="";
					$classTh="class='spec'";
				}
				
			if($_prestamos[$i]['fechaHasta'] <= date("Y-m-d"))
			{
			$men="Debe Devolver La Netbook";
			$color= "red";
			}
			else
			{
			$men="Ok";
			$color= "black";
			}
			
		?>			
			<tr>			
			<th <?php echo $classTh?> >
					<center><?php echo $_prestamos[$i]['numSerie']?></center>
				</th>	
			<th <?php echo $classTh?> >
					<center><?php echo $_nombre['nombre']?></center>
				</th>
			<th <?php echo $classTh?> >
					<center><?php echo $_prestamos[$i]['fechaDesde']?></center>
				</th>
			<th <?php echo $classTh?> >
					<center><?php echo $_prestamos[$i]['fechaHasta']?></center>
				</th>
			<th <?php echo $classTh?> style="color:<?php echo $color?>;"></center>
					<center><?php echo $men?>
				</th>
			<th <?php echo $classTh?> >
					<center><?php echo $_prestamos[$i]['curso']?></center>
				</th>
			<th <?php echo $classTh?> >
					<center><div id="celdaAcciones">									
					<form method="post" action="devolver.php">
						<input type="hidden" name="Nombre" value="<?php echo $_prestamos[$i]['nombre']?>">
						<input type="hidden" name="nunSerie" value="<?php echo $_prestamos[$i]['numSerie']?>">
					<input type="submit" value="Devolver">
					</form>
					</div>
				
					</div></center>
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
		<a href="listarPrestamos.php?pagina=<?php echo $paginaAnterior?><?php echo $criteriosOrder?>">Anterior</a>	
	<?php }?>
	
	Página <?php echo $_GET['pagina']?>/<?php echo $cantPaginas?> de <?php echo $cantRegistros?> registros
	
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
		<h3>No existen Prestamos Cargados.</h3>
	<?php }?>
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>

