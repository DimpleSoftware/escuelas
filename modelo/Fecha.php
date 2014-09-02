<?php
class Fecha{
	private $año;
	private $mes;
	private $dia;
			
	public function Fecha(){}
	
	#año
	public function setAño($año){
		if(is_numeric($año)){
			$this->año = $año;
		}
		else{
			$this->año=0;
		}
	}
	
	public function getAño(){		
		return $this->año;
	}
	
	#mes
	public function setMes($mes){
		if(is_numeric($mes)){
			$this->mes = $mes;
		}
		else{
			$this->mes=0;
		}
	}
	
	public function getMes(){
		return $this->mes;
	}
	
	#dia
	public function setDia($dia){
		if(is_numeric($dia)){
			$this->dia = $dia;
		}
		else{
			$this->dia=0;
		}
	}
	
	public function getDia(){
		return $this->dia;
	}
	
	public function formatearFecha($fecha){				
		$_fecha = explode("/",$fecha);
		
		$this->setAño($_fecha[2]);
		$this->setMes($_fecha[1]);
		$this->setDia($_fecha[0]);
		
		if(checkdate($this->getMes(),$this->getDia(),$this->getAño())){
			return $fechaFormateada = $this->getAño() . "-" . $this->getMes() . "-" . $this->getDia();
		}
		else{
			return 0;		
		}
		
	}

	public function desformatearFecha($fecha){
		$_fecha = explode("-",$fecha);
		
		$this->setAño($_fecha[0]);
		$this->setMes($_fecha[1]);
		$dia = substr($_fecha[2],0,2);
		$this->setDia($dia);
			
		$fechaDesformateada = $this->getDia() . "/" . $this->getMes() . "/" . $this->getAño();
		
		return $fechaDesformateada;
		
	}
}
?>