<?php 	include_once("../headerAdmin.php");

?>
<script src="<?php echo $httpHostSitio?>js/articulo.js" type="text/javascript"></script>	
<body onload="onLoad();">
<?php
			
	include_once($docRootSitio."modelo/DatosEscuela.php");	
	
	$datoescuela = new DatosEscuela();
	
?>

<?php 	if($_POST["bandera"]){			
		
		$mensaje = $datoescuela->validarDatosEscuela($_POST);
		
		if(!$mensaje){						
			$datoescuela->agregarDatosEscuela();		
			header("location: listarDatosEscuelas.php?insert=1"); 	
			
		}		
	}		
?>

	<title>
			Agregar Datos Escuela
	</title>
	
	
<div id="container">
<div id="main" >
	
	<?php  //include("barraCurso.php");?>					
	
	<!--form-->
	<form enctype="multipart/form-data" method="post" id="formAgregarDatosEscuela" name="formAgregarDatosEscuela">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">		
	
		<fieldset>
		<legend>Datos Escuela</legend>	
		
		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--nombre-->
		<label>Nombre Director: *</label> <input type="text" style="width:195px;height:18px;" name="nombreDirector" value="<?php echo $_POST['nombreDirector']?>" /> <br />
        <!--dniDirector-->
		<label>DNI Director: *</label> <input type="text" style="width:195px;height:18px;" name="dniDirector" value="<?php echo $_POST['dniDirector']?>" /> <br />
		<!--CUIL Director-->
		<label>CUIL Director: *</label> <input type="text" style="width:195px;height:18px;" name="cuilDirector" value="<?php echo $_POST['cuilDirector']?>" /> <br />
		<!--numero Escuela-->
		<label>NumeroEscuela: *</label> <input type="text" style="width:195px;height:18px;" name="numeroEscuela" value="<?php echo $_POST['numeroEscuela']?>" /> <br />
		<!--nombre Escuela-->
		<label>Nombre Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="nombreEscuela" value="<?php echo $_POST['nombreEscuela']?>" /> <br />
		<!--cue Escuela-->
		<label>CUE Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="cueEscuela" value="<?php echo $_POST['cueEscuela']?>" /> <br />
		<!--seccion Escuela-->
		<label>Seccion Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="seccionEscuela" value="<?php echo $_POST['seccionEscuela']?>" /> <br />
		<!--domicilio Escuela-->
		<label>Domicilio Escuela: *</label> <input type="text" style="width:195px;height:18px;" name="domicilioEscuela" value="<?php echo $_POST['domicilioEscuela']?>" /> <br />
		<!--ciudad-->
		<label>Ciudad: *</label> <input type="text" style="width:195px;height:18px;" name="ciudad" value="<?php echo $_POST['ciudad']?>" /> <br />
		
		<!--submit-->
		<input type="submit" value="Agregar"> * Campos obligatorios
		
		</fieldset>
	</form>				
	
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
