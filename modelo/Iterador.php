<?php
class Iterador{

	private $_array;
			
	public function Iterador(){}
	
	public function iterarObjeto($_array){
	$this->_array = $_array;
	
	$_objeto = mysql_fetch_array($this->_array);
		
	return $_objeto;
	}
	
	
	public function iterarObjetos($_array){
	$this->_array = $_array;
		
	$tupla=1;       		
            while($_objeto=mysql_fetch_array($this->_array)) {
								
				$_atributos = array_keys($_objeto);
												
				for($i=1;$i<=count($_atributos);$i++){
				
					if($i%2!=0){
						$_objetos[$tupla][$_atributos[$i]] = $_objeto[$_atributos[$i]];				
					}				
				}	
                $tupla++;
			}  
			
	return $_objetos;	
}
	
	
	
}	
?>

