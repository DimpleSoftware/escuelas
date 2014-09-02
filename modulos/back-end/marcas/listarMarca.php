<?php 	include_once("../headerAdmin.php");		

	include_once($docRootSitio."modelo/Marca.php");		
		
	$mar1 = new Marca();
	
	$_marca = $mar1->listarMarca($_GET['Marca']);
	
?>

	<title>
			Listar Marca
	</title>
	
	
<div id="container" >
	<div id="main" >	
	

	<?php  include("barraMarca.php") ?>				

	<h3>Detalle De La Marca</h3>	
	<table id="mytable" cellspacing="0" cellpadding="0">
		<tr>
			<th class="alt">Nombre</th>
			<td><?php echo $_marca['nombre']?></td>
		</tr>
	</table>	
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->


<?php  include("../footerAdmin.php") ?>
