<?php
class Fecha{
	private $a�o;
	private $mes;
	private $dia;
			
	public function Fecha(){}
	
	#a�o
	public function setA�o($a�o){
		if(is_numeric($a�o)){
			$this->a�o = $a�o;
		}
		else{
			$this->a�o=0;
		}
	}
	
	public function getA�o(){		
		return $this->a�o;
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
		
		$this->setA�o($_fecha[2]);
		$this->setMes($_fecha[1]);
		$this->setDia($_fecha[0]);
		
		if(checkdate($this->getMes(),$this->getDia(),$this->getA�o())){
			return $fechaFormateada = $this->getA�o() . "-" . $this->getMes() . "-" . $this->getDia();
		}
		else{
			return 0;		
		}
		
	}

	public function desformatearFecha($fecha){
		$_fecha = explode("-",$fecha);
		
		$this->setA�o($_fecha[0]);
		$this->setMes($_fecha[1]);
		$dia = substr($_fecha[2],0,2);
		$this->setDia($dia);
			
		$fechaDesformateada = $this->getDia() . "/" . $this->getMes() . "/" . $this->getA�o();
		
		return $fechaDesformateada;
		
	}
}
?>