<?php 	
	include_once("../headerAdmin.php");	
	include_once($docRootSitio."modelo/Netbook.php");		
	include_once($docRootSitio."modelo/Marca.php");	
		
	$net1 = new Netbook();			
	$mar1 = new Marca();	
	
	$_netbook = $net1->listarNetbook($_POST['Netbook']);	
	$_marcas = $mar1->listarMarcas();

	#numSerie
	if($_POST['numSerie']){
		$numSerie = $_POST['numSerie'];
	}
	else{		
		$numSerie = $_netbook['numSerie'];
	}
	
	#MarcaNetbook
	if($_POST['MarcaNetbook']){
		$_marca = $mar1->listarMarca($_POST['MarcaNetbook']);
		}
	else{
		if($_netbook['MarcaNetbook']!=0){
			$_marca = $mar1->listarMarca($_netbook['MarcaNetbook']);
		}
		else{
			$_marca['nombre'] = "Elija una Marca de Netbook para el alumnos";
		}
	}
	
	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $net1->validarNetbook($_POST);
		
		if(!$mensaje){						
			$update = $net1->modificarNetbook();	
			header("location: listarNetbooks.php?update=$update"); 	
			exit();		
		}		
	}	
?>

<title>Modificar Datos De La Netbook</title>
	
<div id="container">
<div id="main" >	

	<?php  include("barraNetbook.php") ?>				

	<!--form-->
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Nettbok" value="<?php echo $net1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $net1->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
			
		<fieldset>
		<legend> Información del la Netbook</legend>			
		
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--alumno-->
		<label>Numero De Serie: *</label> <input type="text" style="width:195px;height:18px;" name="numSerie" value="<?php echo $numSerie?>" /> <br />
	
		<label>Marca Netbook: *</label>
			<select name="MarcaNetbook" style="width:195px;height:20px;" >
					<option selected value="<?php echo $_marca['id']?>"><?php echo $_marca['nombre']?></option>
					<?php for($i=1;$i<=count($_marcas);$i++){?>
						<option value="<?php echo $_marcas[$i]['id']?>"><?php echo $_marcas[$i]['nombre']?></option>
					<?php }?>
			</select> <br />
		
		<!--submit-->
		<input type="submit" value="Modificar"> * Campos obligatorios
		</fieldset>	
	</form>				
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>