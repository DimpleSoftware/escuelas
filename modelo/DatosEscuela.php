<?php	include_once($docRootSitio."utiles/conexion.php");
	include_once("Iterador.php");	
		
class DatosEscuela{
		
	private $id;
	private $nombreDirector;
	private $dniDirector;
	private $cuilDirector;
	private $numeroEscuela;
	private $nombreEscuela;
	private $cueEscuela;
	private $seccionEscuela;
	private $domicilioEscuela;
	private $ciudad;
	
	public function DatosEscuela(){}
	
	#id	
	public function setId($id){
		$this->id = mysql_real_escape_string(strip_tags(trim($id)));		
	}	
	public function getId(){	
		return $this->id;
	}
	
	#nombre	Director
	
	public function setNombreDirector($nombreDirector){
		$this->nombreDirector = mysql_real_escape_string(strip_tags(trim($nombreDirector)));	
	}
	public function getNombreDirector(){
		return $this->nombreDirector;
	}		
	
	#dni Director
	
	public function setDniDirector($dniDirector){
		$this->dniDirector = mysql_real_escape_string(strip_tags(trim($dniDirector)));
	}
	public function getDniDirector(){
		return $this->dniDirector;
	}
	
	#cuil	Director
	
	public function setCuilDirector($cuilDirector){
		$this->cuilDirector = mysql_real_escape_string(strip_tags(trim($cuilDirector)));
	}
	public function getCuilDirector(){
		return $this->cuilDirector;
	}
	
	
	#numero Escuela
	
	public function setNumeroEscuela($numeroEscuela){
		$this->numeroEscuela = mysql_real_escape_string(strip_tags(trim($numeroEscuela)));
	}
	public function getNumeroEscuela(){
		return $this->numeroEscuela;
	}
	
	
	#nombre	Escuela
	
	public function setNombreEscuela($nombreEscuela){
		$this->nombreEscuela = mysql_real_escape_string(strip_tags(trim($nombreEscuela)));
	}
	public function getNombreEscuela(){
		return $this->nombreEscuela;
	}
	
	#cue Escuela
	
	public function setCueEscuela($cueEscuela){
		$this->cueEscuela = mysql_real_escape_string(strip_tags(trim($cueEscuela)));
	}
	public function getCueEscuela(){
		return $this->cueEscuela;
	}
	
	
	#seccion Escuela
	
	public function setSeccionEscuela($seccionEscuela){
		$this->seccionEscuela = mysql_real_escape_string(strip_tags(trim($seccionEscuela)));
	}
	public function getSeccionEscuela(){
		return $this->seccionEscuela;
	}
	
	#domicilio Escuela
	
	public function setDomicilioEscuela($domicilioEscuela){
		$this->domicilioEscuela = mysql_real_escape_string(strip_tags(trim($domicilioEscuela)));
	}
	public function getDomicilioEscuela(){
		return $this->domicilioEscuela;
	}
	
	#ciudad
	
	public function setCiudad($ciudad){
		$this->ciudad = mysql_real_escape_string(strip_tags(trim($ciudad)));
	}
	public function getCiudad(){
		return $this->ciudad;
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
	
	public function existeDatosEscuela(){
	global $docRootSitio;	
		
	$q="SELECT nombre FROM curso WHERE nombre='{$this->getNombre()}' ";
									
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
			
	public function listarDatosEscuela($DatosEscuela){
		global $docRootSitio;		
		$this->setId($DatosEscuela);
				
		$q = "SELECT * FROM datosescuela WHERE id='{$this->getId()}' LIMIT 1";
	
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
	
	public function listarDatosEscuelas($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM datosescuela ";
				
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
	
	public function setDatosEscuela($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarDatosEscuela($_post){	
	$this->setDatosEscuela($_post);
		
	/*if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Curso.";	
		return $mensaje;
	}*/
	
}	
	
	public function agregarDatosEscuela(){		
	global $docRootSitio;   			
 	
	echo  $q="INSERT INTO datosescuela (id,nombreDirector,dniDirector,cuilDirector,numeroEscuela,nombreEscuela,cueEscuela,seccionEscuela,domicilioEscuela,ciudad) "
			."VALUES ('','{$this->getNombreDirector()}','{$this->getDniDirector()}','{$this->getCuilDirector()}','{$this->getNumeroEscuela()}','{$this->getNombreEscuela()}','{$this->getCueEscuela()}','{$this->getSeccionEscuela()}','{$this->getDomicilioEscuela()}','{$this->getCiudad()}');";
	
	try {			
		$result = mysql_query($q);
		$this->setId(mysql_insert_id());
           if(!$result) {
            throw new Exception("<b>Explicar el error aqui</b>");
            
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
	
	public function modificarDatosEscuela(){
		global $docRootSitio;			
				
	  echo $q="UPDATE datosescuela SET nombreDirector='{$this->getNombreDirector()}',dniDirector='{$this->getDniDirector()}',cuilDirector='{$this->getDniDirector()}',numeroEscuela='{$this->getNumeroEscuela()}',cueEscuela='{$this->getCiudad()}',domicilioEscuela='{$this->getDomicilioEscuela()}',ciudad='{$this->getCiudad()}' WHERE id='{$this->getId()}'";	
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
	
	public function eliminarDatosEscuela($DatosEscuela) {
	global $docRootSitio; 	
	$this->setId($DatosEscuela);
		
	$q = "DELETE FROM datosescuela WHERE id='{$this->getId()}' LIMIT 1";
	
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
			