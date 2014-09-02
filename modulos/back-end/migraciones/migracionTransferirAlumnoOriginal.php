<?php 	include_once("../headerAdmin.php");

?>
<script src="<?php echo $httpHostSitio?>js/articulo.js" type="text/javascript"></script>	
<body onload="onLoad();">
<?php
			
	include_once($docRootSitio."modelo/Alumno.php");	
	include_once($docRootSitio."modelo/DatosEscuela.php");
	include_once($docRootSitio."modelo/Curso.php");
	
	$alu1 = new Alumno();
	$escuela = new DatosEscuela();
	$cur1 = new Curso();
	$_escuelas = $escuela->listarDatosEscuelas($offset,$limit,$campoOrder,$order);	
	
	$_cursos = $cur1->listarCursos();
	
	#Curso
	if($_POST['curso']){
		$_curso = $cur1->listarCurso($_POST['curso']);
	}
	else{
		$_curso['nombre'] = "Elija Un Curso Para El Alumno";
	}
	
	#Escuela
	if($_POST['nombreEscuela']){
	  	$_escuelas = $escuela->listarDatosEscuela($_POST['nombreEscuela']);
	}
	else{
		$_escuelas['nombre'] = "Elija una Escuela";
	}
	
?>

<?php /*	if($_POST["bandera"]){			
		
	//	$mensaje = $alu1->validarAlumno($_POST);
		
		if(!$mensaje){						
			//$alu1->agregarAlumno();		
		//	header("location: listarAlumnos.php?insert=1"); 	
			exit();		
		}		
	}	*/	
?>

	<title>
			Migraciones Transferir Alumno
	</title>
	
	
<div id="container">
<div id="main" >
	
	<?php  include("barraMigraciones.php");?>					
	
	<h3 style="margin-left:125px;">Migracion Alumno</h3>
	
	<!--form-->
	

	<form  action="<?php echo $httpHostSitio?>modulos/back-end/migraciones/formMigracionTransferir.php" method="post" enctype="multipart/form-data" target="_blank">
	
	<!--bandera <input type="hidden" name="bandera" value="1"> -->
				
	
		<fieldset>
		<legend> Migracion Transferir Alumno</legend>	
		
		<?php if($mensaje){?>
				<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>		
		<?php 

		
		
		?> 
		<!--Escuela-->
		<label> Escuela: *</label>
			<select name="datosEscuela" style="width:195px;height:20px;" >
					<option selected value="<?php echo $_escuelas['id']?>"><?php echo $_escuelas['nombreEscuela']?></option>
					<?php for($i=1;$i<=count($_escuelas);$i++){?>
						<option value="<?php echo $_escuelas[$i]['id']?>"><?php echo $_escuelas[$i]['nombreEscuela']?></option>
					<?php }?>
			</select> <br />
		<!--Cuil Alumno-->
		<label>Cuil Alumno: *</label> <input type="text" style="width:195px;height:18px;" name="cuilAlumno" value="<?php echo $_POST['cuilAlumno']?>" /> <br />
		<!--submit-->
		
		<!--  a href="javascript:void(0);" onclick="javascript:window.open('formMigracionTransferir.php?datosEscuela=', '_blank'); window.open('enmienda.php', '_blank'); ">
</a> * Campos obligatorios--> 
<input type="submit" value="Agregar" > 
		
		
		</fieldset>
		
		
		
		
	</form>				
	
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
