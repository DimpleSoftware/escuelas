<?php
	include_once("../../../utiles/principal.php");			
	#incluyo clases
	include_once($docRootSitio."modelo/Administrador.php");	
	
	$ad1 = new Administrador();			
	$mensaje = $ad1->validarFormLoginAdministrador($_POST);	

	if(!$mensaje){		
		
				
		$_administrador = $ad1->loginAdministrador();								
		
		if($_administrador){
			session_start();	
			
			$_SESSION["Administrador"] = $_administrador['id'];
			$_SESSION["nombreUsuario"] = $_administrador['nombreUsuario'];
			$_SESSION["Rol"] = $_administrador['Rol'];
			
			$token = md5(rand().$_SESSION['nombreUsuario']);
			$_SESSION['token'] = $token;	
			
			
			if($_POST['recordar']) {					
				#172800 = 2días
				setcookie("nombreUsuario",$_SESSION["nombreUsuario"],time()+172800,"/","");	
				setcookie("token",$_SESSION['token'],time()+172800,"/","",0);	
								
			}
									
			$ad1->modificarToken($_SESSION["nombreUsuario"],$_SESSION['token']);
			
						
			header("location: " . $httpHostSitio . "modulos/back-end/menuAdmin.php"); 				
			exit();						
		}
		else{
			$mensaje = "La combinación de nombre de usuario y contraseña es incorrecta.";			
		}		
	}	
?>