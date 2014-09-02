<?php 	include_once("../headerAdmin.php");	
	
	include_once($docRootSitio."modelo/Curso.php");		

	$cur1 = new Curso();			
		
	$_curso = $cur1->listarCurso($_POST['Curso']);	

	#nombre
	if($_POST['nombre']){
		$nombre = $_POST['nombre'];
	}
	else{		
		$nombre = $_curso['nombre'];
	}	

	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $cur1->validarCurso($_POST);
		
		if(!$mensaje){						
			$update = $cur1->modificarCurso();	
			header("location: listarCursos.php?update=$update"); 	
			exit();		
		}		
	}	
		
?>

	<title>
			Modificar Datos Del Curso  
	</title>
	
<div id="container">
<div id="main" >	

	<?php  include("barraCurso.php") ?>				

	<!--form-->
	<form enctype="multipart/form-data" method="post">	
		<!--Marca-->
		<input type="hidden" name="Marca" value="<?php echo $cur1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $cur1->getId()?>" />		
		
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />	
			
		<fieldset>
		<legend> Información Del Curso</legend>			
		
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
