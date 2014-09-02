<?php 	include_once("../headerAdmin.php");?>

<script src="<?php echo $httpHostSitio?>js/nuevoAjax.js" type="text/javascript"></script>	
<script src="<?php echo $httpHostSitio?>js/tecnico.js" type="text/javascript"></script>	

<?php 	if($_POST["bandera"]){	

	include_once($docRootSitio."modelo/Prestamo.php");
	include_once($docRootSitio."modelo/Netbook.php");	
	include_once($docRootSitio."modelo/Alumno.php");
	
	$pre1 = new Prestamo();	
	$net1 = new Netbook();	
	$alu1 = new Alumno();	

			$pre1->setNumSerie($_POST['numSerie']);
			$pre1->setCurso($_POST['curso']);
			$pre1->setFechaDesde($_POST['fechaDesde']);
			$pre1->setFechaHasta($_POST['fechaHasta']);		
			$pre1->setNombre($_POST['alumno']);

		$mensaje = $pre1->validarPrestamo($_POST);
		
		if(!$mensaje){			
		$pre1->setNumSerie($_POST['numSerie']);
			$pre1->setCurso($_POST['curso']);
			$pre1->setFechaDesde($_POST['fechaDesde']);
			$pre1->setFechaHasta($_POST['fechaHasta']);	
			$pre1->setNombre($_POST['alumno']);
			
			
			$net1->modificarEstadoNetbook($_POST['numSerie']);
			$alu1->modificarEstadoAlumno($_POST['alumno']);			
			$pre1->agregarPrestamo();	
			header("location: listarPrestamos.php?insert=1"); 	
			exit();		
		}		
	}		
?>
<title>Netbook Para Prestar</title>
	
<div id="container">
<div id="main" >
<?php $valor="Buscar";?>	
	<?php  include("barraPrestamo.php");?>					
	
	<!--form-->
	<form enctype="multipart/form-data" method="post" id="formAgregarNetbook" name="formAgregarNetbook">
	
		<fieldset>
		<legend> Información De La Netbook Para Prestar</legend>	
		
		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		
		<!--Numero De Serie-->
		<div id="algo"><label>Numero De Serie: *</label> <input type="text"style="height:20px;width:195px;" name="numSerie" value="<?php echo $_POST['']?>" /></div>
		<input type="hidden" style="height:20px;width:195px;" name="dire" value="<?php echo $httpHostSitio?>" />
		<div id="palabra" style="border:0px solid #ccc;float:right;margin-right:250px;width:80px;height:20px;background:lightblue;font-Size:18px;" onclick="netbook('<?php echo $_POST['numSerie']?>'),oculta();"><center><?php echo $valor?></center></div>
		
		<div id="datosNetbook"></div>
		
		</fieldset>
	</form>				

</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>