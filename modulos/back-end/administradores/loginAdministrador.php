<?php include_once("../../../utiles/principal.php");		

	#checkeamos cookie
	session_start();	
		
	if(isset($_COOKIE['nombreUsuario']) && isset($_COOKIE['token'])) {	
		
		$_SESSION['nombreUsuario']=$_COOKIE['nombreUsuario'];
		$_SESSION['token']=$_COOKIE['token'];	
	
		header("location: " . $httpHostSitio . "modulos/back-end/menuAdmin.php");			
		exit();
	}
	else{		
		if(isset($_SESSION['nombreUsuario']) && isset($_SESSION['token'])) {		
			header("location: " . $httpHostSitio . "modulos/back-end/menuAdmin.php");			
			exit();
		}
	}

		
	if($_POST["bandera"]){			
		include("ctrlLoginAdministrador.php");
	}

	#incluyo clases	
	include_once($docRootSitio."modelo/Modulo.php");	
	
	#nuevo objeto	
	$m1 = new Modulo();	
	
	#llamo los métodos
	$_modulo = $m1->listarModulo_nombre(nombreModulo());	
		
?>

<?php include_once($docRootSitio."modulos/back-end/administradores/headerLogin.php") ?>

<div id="container">
<div id="main">

	<h3 style="margin:55px 0px 0px 120px;">Login <?php echo $objeto?></h3>
	
	<!--Formulario-->
	<form enctype="multipart/form-data" method="post">
	<input type="hidden" name="bandera" value="1">	
	
	<fieldset >
	
	<legend> Información de Login</legend>	
	<?php if($mensaje){?>
		<div id="mensaje" ><?php echo $mensaje?> </div> 
	<?php }?>
	
	<label>Usuario: *</label> <input type="text" name="nombreUsuario" value="<?php echo $_POST['nombreUsuario']?>"/> <br  />
	<label>Contraseña: *</label> <input type="password" name="clave" value="<?php echo $_POST['clave']?>"/> <br  />
	
	<label>Recordar datos: </label>
		
	<?	if($_POST['recordar']){
			$checked="checked";
		}						
	?>
	<input type="checkbox" name="recordar" <?php echo $checked?>/> <br />
	
		<input type="submit" value="Login" style="border:0px;"> 
		* Campos obligatorios
	</fieldset>		
	</form>					
	
</div><!--main-->	
<div style="clear:both;"></div>
</div><!--container-->

<?php include_once("../footerAdmin.php"); ?>
