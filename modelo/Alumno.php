<?php	include_once($docRootSitio."utiles/conexion.php");
	include_once("Iterador.php");	
		
class Alumno{
		
	private $id;
	private $nombre;
	private $cuil;
	private $direccion;
	private $escuela;
	private $curso;
	private $turno;
	private $nombrePadre;
	private $cuilPadre;
	private $MarcaNetbook;
	private $numSerie;
	private $prestado;
	private $cargador;
	private $bateria;
	
	public function Alumno(){}
	
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
	
	#cuil	
	public function setCuil($cuil){
		$this->cuil = mysql_real_escape_string(strip_tags(trim($cuil)));	
	}
	public function getCuil(){
		return $this->cuil;
	}	
	
	#direccion	
	public function setDireccion($direccion){
		$this->direccion = mysql_real_escape_string(strip_tags(trim($direccion)));	
	}
	public function getDireccion(){
		return $this->direccion;
	}	
	
	#escuela	
	public function setEscuela($escuela){
		$this->escuela = mysql_real_escape_string(strip_tags(trim($escuela)));	
	}
	public function getEscuela(){
		return $this->escuela;
	}	
	
	#curso	
	public function setCurso($curso){
		$this->curso = mysql_real_escape_string(strip_tags(trim($curso)));	
	}
	public function getCurso(){
		return $this->curso;
	}	
	
	#turno	
	public function setTurno($turno){
		$this->turno = mysql_real_escape_string(strip_tags(trim($turno)));	
	}
	public function getTurno(){
		return $this->turno;
	}	

	#nombrePadre	
	public function setNombrePadre($nombrePadre){
		$this->nombrePadre = mysql_real_escape_string(strip_tags(trim($nombrePadre)));	
	}
	public function getNombrePadre(){
		return $this->nombrePadre;
	}	
	
	#cuilPadre	
	public function setCuilPadre($cuilPadre){
		$this->cuilPadre = mysql_real_escape_string(strip_tags(trim($cuilPadre)));	
	}
	public function getCuilPadre(){
		return $this->cuilPadre;
	}	
	
	#MarcaNetbook	
	public function setMarcaNetbook($MarcaNetbook){
		$this->MarcaNetbook = mysql_real_escape_string(strip_tags(trim($MarcaNetbook)));	
	}
	public function getMarcaNetbook(){
		return $this->MarcaNetbook;
	}		
	
	#numSerie	
	public function setNumSerie($numSerie){
		$this->numSerie = mysql_real_escape_string(strip_tags(trim($numSerie)));	
	}
	public function getNumSerie(){
		return $this->numSerie;
	}
	
	#prestado	
	public function setPrestado($prestado){
		$this->prestado = mysql_real_escape_string(strip_tags(trim($prestado)));	
	}
	public function getPrestado(){
		return $this->prestado;
	}
	
	#cargador	
	public function setCargador($cargador){
		$this->cargador = mysql_real_escape_string(strip_tags(trim($cargador)));	
	}
	public function getCargador(){
		return $this->cargador;
	}

	#bateria	
	public function setBateria($bateria){
		$this->bateria = mysql_real_escape_string(strip_tags(trim($bateria)));	
	}
	public function getBateria(){
		return $this->bateria;
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
	
	public function existeAlumno(){
	global $docRootSitio;	
		
	$q="SELECT nombre FROM alumno WHERE nombre='{$this->getNombre()}' ";
									
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
			
	public function listarAlumno($Alumno){
		global $docRootSitio;		
		$this->setId($Alumno);
				
		$q = "SELECT * FROM alumno WHERE id='{$this->getId()}' LIMIT 1";
	
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
		$_alumno = $i1->iterarObjeto($result);					
		return $_alumno;	
	}
	
	public function listarAlumno2($Alumno){
		global $docRootSitio;		
		$this->setId($Alumno);
				
		$q = "SELECT * FROM alumno WHERE numSerie='{$this->getId()}' LIMIT 1";
	
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
		$_alumno = $i1->iterarObjeto($result);					
		return $_alumno;	
	}
	
	public function listarAlumnos($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE MarcaNetbook!=0";
				
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
		$_alumnos = $i1->iterarObjetos($result);	
			
		return $_alumnos;	
	}
	
	public function listarAlumnosSinNetbook($offset="",$limit="",$campoOrder="",$order=""){		
		global $docRootSitio;		
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM alumno WHERE numSerie='0' AND prestado='0' ";
				
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
		$_alumnos = $i1->iterarObjetos($result);	
			
		return $_alumnos;	
	}
	
	public function setAlumno($_post){
		if(is_array($_post)){			
			$_campos = array_keys($_post);		
		}	
			
		for($i=0;$i<count($_campos);$i++){		
			if($_post[$_campos[$i]] != '' && method_exists ($this,"set".agregarMayuscula($_campos[$i]))){
			$this->{"set".agregarMayuscula($_campos[$i])}($_post[$_campos[$i]]);
			}				
		}		
	}
	
	public function validarAlumno($_post){	
	$this->setAlumno($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCurso() == ''){
		$mensaje = "Debes Escribir El <strong>Curso</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuil() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getNombrePadre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuilPadre() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getMarcaNetbook() == 0){
		$mensaje = "Debes Seleccionar Un <strong>Marca</strong> De Netbook Para El Alumno.";	
		return $mensaje;
	}
	
	if($this->getNumSerie() == ''){
		$mensaje = "Debes Escribir El <strong>Numero De Serie</strong> De La Netbook Del Alumno.";	
		return $mensaje;
	}
}	
	
	public function validarAlumnoSinNetbook($_post){	
	$this->setAlumno($_post);
		
	if($this->getNombre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuil() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getDireccion() == ''){
		$mensaje = "Debes Escribir La <strong>Direccion</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getEscuela() == ''){
		$mensaje = "Debes Escribir El Numero De La <strong>Escuela</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCurso() == 0){
		$mensaje = "Debes Escribir El <strong>Curso</strong> Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getTurno() == ''){
		$mensaje = "Debes Seleccionar El <strong>Turno</strong> Del Alumno.";	
		return $mensaje;
	}

	if($this->getNombrePadre() == ''){
		$mensaje = "Debes Escribir El <strong>Nombre</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
	if($this->getCuilPadre() == ''){
		$mensaje = "Debes Escribir El <strong>Cuil</strong> Del Padre Del Alumno.";	
		return $mensaje;
	}
	
}	
	
	public function agregarAlumno(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO alumno (id,nombre,cuil,direccion,escuela,curso,turno,nombrePadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria) "
			."VALUES ('','{$this->getNombre()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getCuilPadre()}','{$this->getMarcaNetbook()}','{$this->getNumSerie()}','1','{$this->getCargador()}','{$this->getBateria()}');";
	
	try {			
		$result = mysql_query($q);
		$this->setId(mysql_insert_id());
           if(!$result) {
            throw new Exception("<b>Explicar el error aquí</b>");
            
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
	
	public function agregarAlumnoSinNetbook(){		
	global $docRootSitio;   			
 	
	$q="INSERT INTO alumno (id,nombre,cuil,direccion,escuela,curso,turno,nombrePadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria) "
			."VALUES ('','{$this->getNombre()}','{$this->getCuil()}','{$this->getDireccion()}','{$this->getEscuela()}','{$this->getCurso()}','{$this->getTurno()}','{$this->getNombrePadre()}','{$this->getCuilPadre()}','','','','','');";
	
	try {			
		$result = mysql_query($q);
		$this->setId(mysql_insert_id());
           if(!$result) {
            throw new Exception("<b>Explicar el error aquí</b>");
            
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
	
	public function agregarNetbookSinAlumno(){		
	global $docRootSitio;   			
 	
	echo $q="INSERT INTO alumno (id,nombre,cuil,direccion,escuela,curso,turno,nombrePadre,cuilPadre,MarcaNetbook,numSerie,prestado,cargador,bateria) "
			."VALUES ('','Nombre Director','Cuil Director','Direccion Escuela','Numero Escuela','7','2','No Posee','No Posee','{$this->getMarcaNetbook()}','{$this->getNumSerie()}','0','','');";
	
	try {			
		$result = mysql_query($q);
		$this->setId(mysql_insert_id());
           if(!$result) {
            throw new Exception("<b>Explicar el error aquí</b>");
            
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
	
	public function modificarAlumno(){
		global $docRootSitio;			
				
	  $q="UPDATE alumno SET nombre='{$this->getNombre()}',curso='{$this->getCurso()}',cuil='{$this->getCuil()}',nombrePadre='{$this->getNombrePadre()}',cuilPadre='{$this->getCuilPadre()}',MarcaNetbook='{$this->getMarcaNetbook()}',numSerie='{$this->getNumSerie()}',prestado='0',cargador='{$this->getCargador()}',bateria='{$this->getBateria()}' WHERE id='{$this->getId()}'";	
	
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
	
	public function modificarAlumnoSinNetbook(){
		global $docRootSitio;			
				
	  $q="UPDATE alumno SET nombre='{$this->getNombre()}',cuil='{$this->getCuil()}',direccion='{$this->getDireccion()}',escuela='{$this->getEscuela()}',curso='{$this->getCurso()}',turno='{$this->getTurno()}',nombrePadre='{$this->getNombrePadre()}',cuilPadre='{$this->getCuilPadre()}' WHERE id='{$this->getId()}'";	
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
	
	public function modificarEstadoAlumno($Alumno){
	global $docRootSitio;			
	$this->setId($Alumno);
	
		$q="UPDATE alumno SET prestado='1' WHERE id='{$this->getId()}'";	
	
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

	public function modificarDevolver($Alumno){
	global $docRootSitio;			
	$this->setId($Alumno);
	
	echo	$q="UPDATE alumno SET prestado='0' WHERE id='{$this->getId()}'";	
		
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
	
	public function eliminarAlumno($Alumno) {
	global $docRootSitio; 	
	$this->setId($Alumno);
		
	$q = "DELETE FROM alumno WHERE id='{$this->getId()}' LIMIT 1";
	
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
	
	public function listarAlumnoCuil($Alumno){
		global $docRootSitio;
		$this->setCuil($Alumno);
	
		$q = "SELECT * FROM alumno WHERE cuil='{$this->getCuil()}' LIMIT 1";
	
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
		$_alumno = $i1->iterarObjeto($result);
		return $_alumno;
	}
	
}
			