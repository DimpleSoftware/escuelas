<?php	include_once($docRootSitio."utiles/conexion.php");
	include_once("Iterador.php");	
		
class Rol{
		
	private $id;
	private $nombre;
	
	public function Rol(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
	public function getId(){	
		return $this->id;
	}
	
	#nombre	
	public function setNombre($nombre){
		$this->nombre = mysql_real_escape_string(strip_tags(trim($nombre)));	
	}
	public function getNombre(){
		return $this->nombre;
	}	
	
	public function listarRoles(){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
				
		$q = "SELECT * FROM $tabla ORDER BY nombre ASC";
	
		try{
			$result = mysql_query($q);
				if(!$result) {
					throw new Exception("");
				}
		}      
		catch (Exception $e) {        
			$error['consulta'] = $q;
			$error['mysql'] = mysql_error();            
			include_once ($docRootSitio . "modulos/errores/listarErrores.php");
			exit();
		}
		
		$i1 = new Iterador();
		$_roles = $i1->iterarObjetos($result);	
			
		return $_roles;	
	}

	public function listarRol($Rol){
		global $docRootSitio;
		$tabla = agregarMinuscula(get_class($this));
		
		$this->setId($Rol);
				
		$q = "SELECT * FROM $tabla WHERE id={$this->getId()} LIMIT 1";
	
		try{
			$result = mysql_query($q);
				if(!$result) {
					throw new Exception("");
				}
		}      
		catch (Exception $e) {        
			$error['consulta'] = $q;
			$error['mysql'] = mysql_error();            
			include_once ($docRootSitio . "modulos/errores/listarErrores.php");
			exit();
		}
		
		$i1 = new Iterador();
		$_rol = $i1->iterarObjeto($result);	
			
		return $_rol;	
	}
	
}
			