<?php	include_once($_SERVER["DOCUMENT_ROOT"]."/escuelas/utiles/configSitio.php");	
	session_start();		
	session_unset();
	session_destroy();
	$_SESSION = array();
	
	setcookie("token",$_COOKIE['token'],time()-172800,"/","",0);
	setcookie("nombreUsuario",$_COOKIE['nombreUsuario'],time()-172800,"/","",0);	
		
	header("Location: " . $httpHostSitio . "index.php");
?>
