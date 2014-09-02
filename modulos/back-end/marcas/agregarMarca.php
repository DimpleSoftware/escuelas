<?php 	include_once("../headerAdmin.php");

?>
<script src="<?php echo $httpHostSitio?>js/articulo.js" type="text/javascript"></script>	
<body onload="onLoad();">
<?php
			
	include_once($docRootSitio."modelo/Marca.php");	
	
	$mar1 = new Marca();
	
?>

<?php 	if($_POST["bandera"]){			
		
		$mensaje = $mar1->validarMarca($_POST);
		
		if(!$mensaje){						
			$mar1->agregarMarca();		
			header("location: listarMarcas.php?insert=1"); 	
			exit();		
		}		
	}		
?>

	<title>
			Agregar Marca Netbook
	</title>
	
	
<div id="container">
<div id="main" >
	
	<?php  include("barraMarca.php");?>					
	
	<!--form-->
	<form enctype="multipart/form-data" method="post" id="formAgregarMarca" name="formAgregarMarca">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">		
	
		<fieldset>
		<legend> Información DeL Precio</legend>	
		
		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--nombre-->
		<label>Nombre: *</label> <input type="text" style="width:195px;height:18px;" name="nombre" value="<?php echo $_POST['nombre']?>" /> <br />

		<!--submit-->
		<input type="submit" value="Agregar"> * Campos obligatorios
		
		</fieldset>
	</form>				
	
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
