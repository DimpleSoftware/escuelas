<?php 	include_once("../headerAdmin.php");

?>
<script src="<?php echo $httpHostSitio?>js/articulo.js" type="text/javascript"></script>	
<body onload="onLoad();">
<?php
			
	include_once($docRootSitio."modelo/Curso.php");	
	
	$cur1 = new Curso();
	
?>

<?php 	if($_POST["bandera"]){			
		
		$mensaje = $cur1->validarCurso($_POST);
		
		if(!$mensaje){						
			$cur1->agregarCurso();		
			header("location: listarCursos.php?insert=1"); 	
			exit();		
		}		
	}		
?>

	<title>
			Agregar Curso
	</title>
	
	
<div id="container">
<div id="main" >
	
	<?php  include("barraCurso.php");?>					
	
	<!--form-->
	<form enctype="multipart/form-data" method="post" id="formAgregarCurso" name="formAgregarCurso">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">		
	
		<fieldset>
		<legend> Información DeL Curso</legend>	
		
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
