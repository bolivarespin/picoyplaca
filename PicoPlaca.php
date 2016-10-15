<?php
require_once 'Comprobacion.php';

class PicoPlaca
{
	private $semana=array();
	private $comprobacion;
	public function __construct(){}
	public function setComprobacion(Comprobacion $comprobacion){
		$this->comprobacion = $comprobacion;
	}
	public function addRestriccion(Restriccion $objDia){
		$this->semana[] = $objDia;
	}
	
	public function comprobar(){
		$respuesta=0;
		$autoInvolucrado = 0;
		$tiempoInvolucrado = 0;
		$horaCircula=0;
		$time = strtotime($this->comprobacion->getFecha()); 
		$diaFecha = strftime("%w", $time);
		foreach($this->semana as $diaRestriccion){
			
			if ($diaRestriccion->getDia() == $diaFecha){
				foreach($diaRestriccion->getUltimoDigito() as $digito){
					if ( substr($this->comprobacion->getPlaca(),0,-1)==$digito ){
						$autoInvolucrado=1;
					}
				}
				foreach($diaRestriccion->getHoraPico() as $horaRestriccion){
					$vectorHora = explode("-",$horaRestriccion);
					if ( $this->comprobacion->getHora()>=$vectorHora[0] &&  $this->comprobacion->getHora()<$vectorHora[1]){
						$tiempoInvolucrado=1;
					}
				}
				if ($autoInvolucrado==1 && $tiempoInvolucrado==1)
					$respuesta=1;
				else
					$respuesta=0;
			}
			else
				$respuesta=0;	
		}
		return $respuesta;	
	}
}
?>