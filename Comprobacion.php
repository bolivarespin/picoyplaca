<?php
class Comprobacion
{
	private $fecha;
	private $placa;
	private $hora;
	
	public function __construct(){}
	public function setPlaca($placa){
		$this->placa = $placa;
	}
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
	public function setHora($hora){
		$this->hora = $hora;
	}
	public function getPlaca(){
		return $this->placa;
	}
	public function getHora(){
		return $this->hora;
	}
	public function getFecha(){
		return $this->fecha;
	}
}
?>