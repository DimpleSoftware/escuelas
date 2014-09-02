<?php include_once("../headerAdmin.php");
?>

<?php 	
	
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
	include_once($docRootSitio."modelo/Curso.php");			
			
	#nuevo objeto
	$cur1 = new Curso();				

	$_cursos = $cur1->listarCursos($offset,$limit,$campoOrder,$order);	
	
	#getCantRegistros
	$cantRegistros = $cur1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);
 	
?>

<div id="container" >
	<div id="main" >			
		
		<?php include("barraCurso.php") ?>	

	
	<div style="clear:both;"></div>		
	<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>El Curso Se Agrego Exitosamente.</h4>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<h4>El Curso Se Modificó Exitosamente.</h4>
		<?php }?>
	</div>	
	<?php
	if(!isset($_GET['order']) || $_GET['order']=="DESC"){
			$order = "ASC";
		}
		else{
			$order = "DESC";
		}		

	if(count($_cursos)){?>	
		
		<table id="mytable" cellspacing="0" cellpadding="0">
			<tr>
				<th >					
					<center><b>Nombre</b></center>			
				</th>
				<th >										
					<center><b>Acciones</b></center>
				</th>
			</tr>	
		
		<?php for($i=1;$i<=count($_cursos);$i++){			
						
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
					<center><b><?php echo $_cursos[$i]['nombre']?></b></center>
				</th>	
			
				<th <?php echo $classTh?> >
					<center><b><div id="celdaAcciones">									
					<form method="post" action="modificarCurso.php">
						<input type="hidden" name="Curso" value="<?php echo $_cursos[$i]['id']?>">
						<input type="submit" value="Editar">
					</form>
					</div>
				
					<div id="celdaAcciones">														
					<form method="post" action="eliminarCurso.php">						
						<input type="hidden" name="Curso" value="<?php echo $_cursos[$i]['id']?>">
						<input type="submit" value="Eliminar" onclick="return confirm('¿Está seguro que desea eliminar el siguiente curso <?php echo $_cursos[$i]['nombre']?>?');">
					</form>					
					</div></b></center>
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
		<a href="listarCursos.php?pagina=<?php echo $paginaAnterior?><?php echo $criteriosOrder?>">Anterior</a>	
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
		
		<a href="listarCursos.php?pagina=<?php echo $paginaSiguiente?><?php echo $criteriosOrder?>">Siguiente</a>	
		
	<?php }?>	
	</div>
	
	<?php }
	else{?>
		<h3>No existen Marcas.</h3>
	<?php }?>
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>

