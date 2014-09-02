<?php 	include_once("../headerAdmin.php");	
	
	include_once($docRootSitio."modelo/Marca.php");		

	$mar1 = new Marca();			
		
	$_marca = $mar1->listarMarca($_POST['Marca']);	

	#nombre
	if($_POST['nombre']){
		$nombre = $_POST['nombre'];
	}
	else{		
		$nombre = $_marca['nombre'];
	}	

	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $mar1->validarMarca($_POST);
		
		if(!$mensaje){						
			$update = $mar1->modificarMarca();	
			header("location: listarMarcas.php?update=$update"); 	
			exit();		
		}		
	}	
		
?>

	<title>
			Modificar Datos De La Marca  
	</title>
	
<div id="container">
<div id="main" >	

	<?php  include("barraMarca.php") ?>				

	<!--form-->
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Marca" value="<?php echo $mar1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $mar1->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
			
		<fieldset>
		<legend> Información del los Datos</legend>			
		
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--codigo-->
		<label>Nombre: *</label> <input type="text" style="width:195px;height:18px;" name="nombre" value="<?php echo $nombre?>" /> <br />
		
		<!--submit-->
		<input type="submit" value="Modificar"> * Campos obligatorios
		</fieldset>	
	</form>				
		
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
