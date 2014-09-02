<?php 	include_once("../headerAdmin.php");
	if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta p&aacute;gina.<h2>";
		exit();	
	}
		
	include_once($docRootSitio."modelo/Rol.php");			
	$rol1 = new Rol();	
	$_roles = $rol1->listarRoles();	

	include_once($docRootSitio."modelo/Administrador.php");		
	$ad1 = new Administrador();			
	$_administrador = $ad1->listarAdministrador($_POST['Administrador']);

	#nombre
	if($_POST['nombre']){
		$nombre = $_POST['nombre'];
	}
	else{		
		$nombre = $_administrador['nombre'];
	}
		
	#apellido
	if($_POST['apellido']){
		$apellido = $_POST['apellido'];
	}
	else{
		$apellido = $_administrador['apellido'];
	}
	
	#Rol	
	if($_POST['Rol']){
		$_rol = $rol1->listarRol($_POST['Rol']);
	}
	else{
		if($_administrador['Rol']!=0){
			$_rol = $rol1->listarRol($_administrador['Rol']);
		}
		else{
			$_rol['nombre'] = "Elija un rol para el usuario";
		}
	}
	
	#nombreUsuario
	if($_POST['nombreUsuario']){
		$nombreUsuario = $_POST['nombreUsuario'];
	}
	else{
		$nombreUsuario = $_administrador['nombreUsuario'];
	}
	
	#clave
	if($_POST['clave']){
		$clave = $_POST['clave'];
	}
	else{
		$clave = $_administrador['clave'];
	}

	#bandera
	if($_POST["bandera"]){				
		
		$mensaje = $ad1->validarAdministrador($_POST);
		
		if(!$mensaje){						
			$update = $ad1->modificarAdministrador();		
			header("location: listarAdministradores.php?update=$update"); 	
			exit();		
		}		
	}	
		
?>

	<title>
			Modificar Administrador
	</title>
	
	
<div id="container" >
	<div id="main" >				

	<?php  include("barraAdministradores.php") ?>						

	<!--form-->
	<form enctype="multipart/form-data" method="post">	
		<fieldset>
		<legend> Informaci&oacute;n del Administrador</legend>	
	
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>
		
		<!--Administrador-->
		<input type="hidden" name="Administrador" value="<?php echo $ad1->getId()?>" />
		<!--id-->
		<input type="hidden" name="id" value="<?php echo $ad1->getId()?>" />		
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1" />
	
		<!--nombreDb-->
		<input type="hidden" name="nombreUsuarioDb" value="<?php echo $_administrador['nombreUsuario']?>" />
		
		<!--nombre-->
		<label>Nombre: *</label> <input type="text" style="width:195px;height:18px;" name="nombre" value="<?php echo $nombre?>" /> <br />
		
		<!--apellido-->
		<label>Apellido: *</label> <input type="text" style="width:195px;height:18px;" name="apellido" value="<?php echo $apellido?>" /> <br />
					
		<!--Rol-->		
		<label> Rol: *</label>
			<select name="Rol" style="width:195px;height:20px;" >
					<option selected value="<?php echo $_rol['id']?>"><?php echo $_rol['nombre']?></option>
					<?php for($i=1;$i<=count($_roles);$i++){?>
						<option value="<?php echo $_roles[$i]['id']?>"><?php echo $_roles[$i]['nombre']?></option>
					<?php }?>
			</select> <br />			
		
		<!--nombreUsuario-->
		<label>Nombre de usuario: *</label> <input type="text" style="width:195px;height:18px;" name="nombreUsuario" value="<?php echo $nombreUsuario?>" /> <br />
		
		<!--clave-->
		<label>Contrase&ntilde;a: *</label> <input type="password" style="width:195px;height:18px;" name="clave" value="<?php echo $clave?>" /> <br />
		
		
		<!--submit-->
		<input type="submit" value="Modificar"> * Campos obligatorios
		</fieldset>	
	</form>				
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
