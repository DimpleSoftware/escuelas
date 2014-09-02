<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/principal.php");
	session_start();
		
	if(isset($_SESSION['nombreUsuario']) && isset($_SESSION['token'])) {							
		#incluyo clases
		include_once($docRootSitio."modelo/Administrador.php");	
		
		#nuevo objeto		
		$ad1 = new Administrador();			
		
		#validarObjeto
		$funcion = "listarAdministrador_nombreUsuario_token";
				
		$Administrador = $ad1->$funcion($_SESSION['nombreUsuario'],$_SESSION['token']);	
	
		if($Administrador){		
			
			$token = md5(rand().$_SESSION['nombreUsuario']);
			$_SESSION['token'] = $token;	
			if(isset($_COOKIE['token'])){								
				setcookie("token",$_SESSION['token'],time()+172800,"/","",0);				
			}
					
			$ad1->modificarToken($_SESSION["nombreUsuario"],$_SESSION['token']);
		}
		else{			
			header("location: " . $httpHostSitio . "utiles/ctrlLogout.php"); 				
			exit();				
		}
	}
	else{		
			//header("location: " . $httpHostSitio . "index.php");		
			exit();			
		
	}
		
?>


