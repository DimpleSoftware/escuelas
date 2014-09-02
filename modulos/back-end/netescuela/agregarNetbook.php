<?php 	include_once("../headerAdmin.php");

?>
<script src="<?php echo $httpHostSitio?>js/articulo.js" type="text/javascript"></script>	
<body onload="onLoad();">
<?php
			
	include_once($docRootSitio."modelo/Netbook.php");		
	include_once($docRootSitio."modelo/Marca.php");
	include_once($docRootSitio."modelo/Alumno.php");
	
	$net1 = new Netbook();
	$mar1 = new Marca();
	$alu1 = new Alumno();
	
	$_marcas = $mar1->listarMarcas();
	
	#Marca
	if($_POST['MarcaNetbook']){
		$_marca = $mar1->listarMarca($_POST['MarcaNetbook']);
	}
	else{
		$_marca['nombre'] = "Elija Una Marca De Netbook Para El Alumno";
	}
	
?>

<?php 	if($_POST["bandera"]){			
		
		$mensaje = $net1->validarNetbook($_POST);
		
		if(!$mensaje){						
			$net1->agregarNetbook();
			$alu1->setNumSerie($_POST['numSerie']);
			$alu1->setMarcaNetbook($_POST['MarcaNetbook']);
			$alu1->agregarNetbookSinAlumno();			
			header("location: listarNetbooks.php?insert=1"); 	
			exit();		
		}		
	}		
?>

	<title>
			Agregar Netbook
	</title>
	
	
<div id="container">
<div id="main" >
	
	<?php  include("barraNetbook.php");?>					
	
	<!--form-->
	<form enctype="multipart/form-data" method="post" id="formAgregarNetbook" name="formAgregarNetbook">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">		
	
		<fieldset>
		<legend> Información De La Netbook</legend>	
		
		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>	
		
		<!--Numero De Serie-->
		<label>Numero De Serie: *</label> <input type="text" style="width:195px;height:18px;" name="numSerie" value="<?php echo $_POST['numSerie']?>" /> <br />

		<!--MArca Netbook-->
		<label> Marca De La Netbook: *</label>
			<select name="MarcaNetbook" style="width:195px;height:20px;" >
					<option selected value="<?php echo $_marca['id']?>"><?php echo $_marca['nombre']?></option>
					<?php for($i=1;$i<=count($_marcas);$i++){?>
						<option value="<?php echo $_marcas[$i]['id']?>"><?php echo $_marcas[$i]['nombre']?></option>
					<?php }?>
			</select> <br />
		
		<!--submit-->
		<input type="submit" value="Agregar"> * Campos obligatorios
		
		</fieldset>
	</form>				
	
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
