<?php
class Restriccion
{
	private $dia;
	private $ultimoDigito = array();
	private $horaPico = array();
	
	public function __construct(){}
	public function setDia($dia){
		$this->dia = $dia;
	}
	public function addUltimoDigito($digito){
		$this->ultimoDigito[] = $digito;
	}
	public function addHoraPico($hora){
		$this->horaPico[] = $hora;
	}
	public function getDia(){
		return $this->dia;
	}
	public function getUltimoDigito(){
		return $this->ultimoDigito;
	}
	public function getHoraPico(){
		return $this->horaPico;
	}
}
?>