<?php	include_once($docRootSitio."utiles/conexion.php");
	include_once("Iterador.php");	
		
class Turno{
		
	private $id;
	private $nombre;
	
	public function Turno(){}
	
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
	
	public function getCantRegistros(){
		$q = "SELECT FOUND_ROWS() as cantidad";
		
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
		$_objeto = $i1->iterarObjeto($result);
		$cantRegistros = $_objeto['cantidad'];
			
		return $cantRegistros;	
		
	}
	
	public function existeTurno(){
	global $docRootSitio;	
		
	$q="SELECT nombre FROM turno WHERE nombre='{$this->getNombre()}' ";
									
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
	$_cliente = $i1->iterarObjeto($result);
			
	if($_cliente['nombre']){
		return 1;
	}
	else{
		return 0;
	}	
}
			
	public function listarTurnos($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM turno ";
				
		if($campoOrder!= "" && $order!=""){			
			${$campoOrder} = $campoOrder;			
			$q .= " ORDER BY  ${$campoOrder} $order ";						
		}		
		
		if($limit!=""){
			$q .= " LIMIT $offset,$limit ";			
		}
				
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
		$_clientes = $i1->iterarObjetos($result);	
			
		return $_clientes;	
	}
	
	public function listarTurno($Turno){
		global $docRootSitio;		
		$this->setId($Turno);
				
		$q = "SELECT * FROM turno WHERE id='{$this->getId()}' LIMIT 1";
	
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
		$_cliente = $i1->iterarObjeto($result);					
		return $_cliente;	
	}
	
	public function setTurno($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarTurno($_post){	
	$this->setCurso($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Turno.";	
		return $mensaje;
	}
	
}	
	
	public function agregarTurno(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO turno (id,nombre) "
			."VALUES ('','{$this->getNombre()}');";
	
	try {			
		$result = mysql_query($q);
		$this->setId(mysql_insert_id());
           if(!$result) {
            throw new Exception("<b>Explicar el error aqu�</b>");
            
			}
		}
		catch (Exception $e) {
				mysql_query("ROLLBACK");
				$error['consulta'] = $q;
				$error['mysql'] = mysql_error();            
				include_once ($docRootSitio . "modulos/errores/listarErrores.php");
				exit();
		}			  		
				
		return 1;			
}
	
	public function modificarTurno(){
		global $docRootSitio;			
				
	  echo $q="UPDATE turno SET nombre='{$this->getNombre()}' WHERE id='{$this->getId()}'";	
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
			
		return 	1;
	}
	
	public function eliminarTurno($Turno) {
	global $docRootSitio; 	
	$this->setId($Turno);
		
	$q = "DELETE FROM turno WHERE id='{$this->getId()}' LIMIT 1";
	
	try {
	
	$result = mysql_query($q);
            if(!$result) {
                throw new Exception("");
            }
    }      
    catch (Exception $e) {        
			mysql_query("ROLLBACK");
			$error['consulta'] = $q;
            $error['mysql'] = mysql_error();            
            include_once ($docRootSitio . "modulos/errores/listarErrores.php");
            exit();
    }		
	return 1;
}
	
	
}
			