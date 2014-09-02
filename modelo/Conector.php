<?php #CLASE Conector
class Conector {

	private $host;
	private $usuarioDb;
	private $claveDb;
	private $db;	

#Constructor
function Conector($host,$usuarioDb,$claveDb,$db) {
	$this->host = $host;	
	$this->usuarioDb = $usuarioDb;	
	$this->claveDb = $claveDb;	
	$this->db = $db;
}
	
function conectar() {
	global $docRootSitio;

	try{
			$conexion = mysql_connect($this->host,$this->usuarioDb,$this->claveDb);
			$select_db = mysql_select_db($this->db);
			
				if(!$conexion || !$select_db) {
					throw new Exception("<b>Error de CONEXION;</b>");
				}
		}      
		catch (Exception $e) {        

			$error['mysql'] = mysql_error();            
            include_once ($docRootSitio . "modulos/errores/listarErrores.php");
            exit();
    }	
	
	return $conexion;
}

public function desconectar($conexion){
	mysql_close($conexion);
	
}
  
}
?>








