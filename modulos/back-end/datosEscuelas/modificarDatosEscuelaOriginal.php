<?php 	include_once("../headerAdmin.php");	
	
	include_once($docRootSitio."modelo/DatosEscuela.php");		

	$datosesc = new DatosEscuela();			
		
	$_datos = $datosesc->listarDatosEscuela($_POST['DatosEscuela']);	

	#nombre
	if($_POST['nombreDirector']){
		$nombreDirector = $_POST['nombreDirector'];
	}
	else{		
		$nombreDirector = $_datos['nombreDirector'];
	}	

	#dni Director
	
	if($_POST['dniDirector']){
		$dniDirector = $_POST['dniDirector'];
	}
	else{
		$dniDirector = $_datos['dniDirector'];
	}
	
	#cuil Director
	if($_POST['cuilDirector']){
		$cuilDirector = $_POST['cuilDirector'];
	}
	else{
		$cuilDirector= $_datos['cuilDirector'];
	}
	#numero Escuela
	if($_POST['numeroEscuela']){
		$numeroEscuela = $_POST['numeroEscuela'];
	}
	else{
		$numeroEscuela= $_datos['numeroEscuela'];
	}	
	#nombre Escuela
	if($_POST['nombreEscuela']){
		$nombreEscuela = $_POST['nombreEscuela'];
	}
	else{
		$nombreEscuela= $_datos['nombreEscuela'];
	}
	
	#cue Escuela
	if($_POST['cueEscuela']){
		$cueEscuela = $_POST['cueEscuela'];
	}
	else{
		$cueEscuela= $_datos['cueEscuela'];
	}
	
	#seccion Escuela
	if($_POST['seccionEscuelaa']){
		$seccionEscuela = $_POST['seccionEscuela'];
	}
	else{
		$seccionEscuela= $_datos['seccionEscuela'];
	}
	
	#Domicilio Escuela
	if($_POST['domicilioEscuela']){
		$domicilioEscuela = $_POST['domicilioEscuela'];
	}
	else{
		$domicilioEscuela= $_datos['domicilioEscuela'];
	}
	
	#ciudad
	if($_POST['ciudad']){
		$ciudad = $_POST['ciudad'];
	}
	else{
		$ciudad= $_datos['ciudad'];
	}
	
	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $datosesc->validarDatosEscuela($_POST);
		
		if(!$mensaje){						
			$update = $datosesc->modificarDatosEscuela();	
			header("location: listarDatosEscuelas.php?update=$update"); 	
			exit();		
		}		
	}	
		
?>

	<title>
			Modificar Datos de la Escuela
	</title>
	
<div id="container">
<div id="main" >	

	<?php  include("barraDatosEscuela.php") ?>				

	<!--form-->
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Marca" value="<?php echo $datosesc->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $datosesc->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
			
		<fieldset>
		<legend> Modificar Datos Escuela</legend>			
		
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--codigo-->
		<label>Nombre Director: *</label> <input type="text" style="width:195px;height:18px;" name="nombreDirector" value="<?php echo $nombreDirector?>" /> <br />
		<label>Dni Director: *</label> <input type="text" style="width:195px;height:18px;" name="dniDirector" value="<?php echo $dniDirector?>" /> <br />
		<label>Cuil Director: *</label> <input type="text" style="width:195px;height:18px;" name="cuilDirector" value="<?php echo $cuilDirector?>" /> <br />
		<label>Numero Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="numeroEscuela" value="<?php echo $numeroEscuela?>" /> <br />
		<label>Nombre Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="nombreEscuela" value="<?php echo $nombreEscuela?>" /> <br />
		<label>CUE Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="cueEscuela" value="<?php echo $cueEscuela?>" /> <br />
		<label>Seccion Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="seccionEscuela" value="<?php echo $seccionEscuela?>" /> <br />
		<label>Domicilio Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="domicilioEscuela" value="<?php echo $domicilioEscuela?>" /> <br />
		<label>Ciudad: *</label> <input type="text" style="width:195px;height:18px;" name="ciudad" value="<?php echo $ciudad?>" /> <br />
		
		<!--submit-->
		<input type="submit" value="Modificar"> * Campos obligatorios
		</fieldset>	
	</form>				
		
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
