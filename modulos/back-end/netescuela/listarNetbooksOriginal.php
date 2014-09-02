<?php include_once("../headerAdmin.php");
?>

<?php 	
	
	#Paginaci�n	
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
	include_once($docRootSitio."modelo/Netbook.php");			
	include_once($docRootSitio."modelo/Marca.php");
	
	#nuevo objeto
	$net1 = new Netbook();				
	$mar1 = new Marca();

	$_netbooks = $net1->listarNetbooks($offset,$limit,$campoOrder,$order);	
	
	#getCantRegistros
	$cantRegistros = $net1->getCantRegistros();	
	$cantPaginas = ceil($cantRegistros/$limit);
 	
?>

<div id="container" >
	<div id="main" >			
		
		<?php include("barraNetbook.php") ?>	

	
	<div style="clear:both;"></div>		
	<div id="resAcciones">
		<?php if($_GET['insert']==1){?>
			<h4>La Netbook Se Agrego Exitosamente.</h4>
		<?php }?>
		
		<?php if($_GET['update']==1){?>
			<h4>La Netbook Se Modifico Exitosamente.</h4>
		<?php }?>
	</div>	
	<?php
	if(!isset($_GET['order']) || $_GET['order']=="DESC"){
			$order = "ASC";
		}
		else{
			$order = "DESC";
		}		

	if(count($_netbooks)){?>	
		
		<table id="mytable" cellspacing="0" cellpadding="0">
			<tr>
				<th >					
					<center><b>Numero De Serie</b></center>		
				</th>
				<th >					
					<center><b>Curso</b></center>		
				</th>
				<th>
					<center><b>Marca De La Netbook</b></center>
				</th>
				<th >										
					<center><b>Acciones</b></center>
				</th>
			</tr>	
		
		<?php for($i=1;$i<=count($_netbooks);$i++){			
		$_marca = $mar1->listarMarca($_netbooks[$i]['MarcaNetbook']);	
		
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
					<center><?php echo $_netbooks[$i]['numSerie']?></center>
				</th>	
			<th <?php echo $classTh?> >
					<center><?php echo $_netbooks[$i]['curso']?></center>
				</th>
			<th <?php echo $classTh?> >
					<center><?php echo $_marca['nombre']?></center>
				</th>				
			<th <?php echo $classTh?> >
					<center><div id="celdaAcciones">									
					<form method="post" action="modificarNetbook.php">
						<input type="hidden" name="Netbook" value="<?php echo $_netbooks[$i]['id']?>">
						<input type="submit" value="Editar">
					</form>
					</div>
				
					<div id="celdaAcciones">														
					<form method="post" action="eliminarNetbook.php">						
						<input type="hidden" name="Netbook" value="<?php echo $_netbooks[$i]['id']?>">
						<input type="submit" value="Eliminar" onclick="return confirm('�Est� seguro que desea eliminar la Netbook Con el siguiente numero de serie <?php echo $_netbooks[$i]['numSerie']?>?');">
					</form>					
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
		<a href="listarNetbooks.php?pagina=<?php echo $paginaAnterior?><?php echo $criteriosOrder?>">Anterior</a>	
	<?php }?>
	
	P�gina <?php echo $_GET['pagina']?>/<?php echo $cantPaginas?> de <?php echo $cantRegistros?> registros
	
	<?php if($_GET['pagina']<$cantPaginas){
		$paginaSiguiente=$_GET['pagina']+1;
		
		if(isset($_GET['campoOrder']) && isset($_GET['order'])){
			$campoOrder = $_GET['campoOrder'];+
			$order = $_GET['order'];
			$criteriosOrder = "&campoOrder=$campoOrder&order=$order";
		}
				
	?>		
		
		<a href="listarNetbooks.php?pagina=<?php echo $paginaSiguiente?><?php echo $criteriosOrder?>">Siguiente</a>	
		
	<?php }?>	
	</div>
	
	<?php }
	else{?>
		<h3>No existen Netbook.</h3>
	<?php }?>
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>

