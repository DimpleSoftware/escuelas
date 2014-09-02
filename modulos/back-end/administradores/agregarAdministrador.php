<?php 	include_once("../headerAdmin.php");	
	if($_SESSION['Rol']!=1){
		echo "<h2>No tienes permisos para ingresar a esta p&aacute;gina.<h2>";
		exit();	
	}
	
	include_once($docRootSitio."modelo/Rol.php");		
	$rol1 = new Rol();
	
	$_roles = $rol1->listarRoles();
	
	#Rol
	if($_POST['Rol']){
		$_rol = $rol1->listarRol($_POST['Rol']);
	}
	else{
		$_rol['nombre'] = "Elija un rol para el usuario";
	}
	
?>

<?php 	if($_POST["bandera"]){			
		include_once($docRootSitio."modelo/Administrador.php");		
		$ad1 = new Administrador();
		
		$mensaje = $ad1->validarAdministrador($_POST);
		
		if(!$mensaje){						
			$ad1->agregarAdministrador();		
			header("location: listarAdministradores.php?insert=1"); 	
			exit();		
		}		
	}		
?>

	<title>
			Agregar Administrador
	</title>
	
	
<div id="container" >
	<div id="main" >
	
	<?php  include("barraAdministradores.php") ?>				
	
	<!--form-->
	<form enctype="multipart/form-data" method="post">
	
		<!--bandera-->
		<input type="hidden" name="bandera" value="1">
	
		<fieldset>
		<legend> Información del Administrador</legend>	
		
		<?php if($mensaje){?>
		<div id="mensaje"><?php echo $mensaje?> </div> 
		<?php }?>
		
		<!--nombre-->
		<label>Nombre: *</label> <input type="text" name="nombre" style="width:195px;height:18px;" value="<?php echo $_POST['nombre']?>" /> <br />
				
		<!--apellido-->
		<label>Apellido: *</label> <input type="text" name="apellido" style="width:195px;height:18px;" value="<?php echo $_POST['apellido']?>" /> <br />
						
		<!--Rol-->		
		<label> Rol: *</label>
			<select name="Rol" style="width:195px;height:20px;" >
					<option selected value="<?php echo $_rol['id']?>"><?php echo $_rol['nombre']?></option>
					<?php for($i=1;$i<=count($_roles);$i++){?>
						<option value="<?php echo $_roles[$i]['id']?>"><?php echo $_roles[$i]['nombre']?></option>
					<?php }?>
			</select> <br />			
		<!--nombreUsuario-->		
		<label>Nombre de usuario: * </label> <input type="text" style="width:195px;height:18px;" name="nombreUsuario" value="<?php echo $_POST['nombreUsuario']?>" /> <br />
		
		<!--clave-->		
		<label>Contrase&ntilde;a: *</label> <input type="password" style="width:195px;height:18px;" name="clave" value="<?php echo $_POST['clave']?>" /> <br />
		
		<!--submit-->
		<input type="submit" value="Agregar"> * Campos obligatorios
		
		</fieldset>
	</form>			
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php  include("../footerAdmin.php") ?>
