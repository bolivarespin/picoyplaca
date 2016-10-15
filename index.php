<?php
require_once 'Restriccion.php';
require_once 'PicoPlaca.php';
require_once 'Comprobacion.php';

$objRestriccionL = new Restriccion();
$objRestriccionL->setDia(1);
$objRestriccionL->addUltimoDigito(1);
$objRestriccionL->addUltimoDigito(2);
$objRestriccionL->addHoraPico('07:00:00-09:30:00');
$objRestriccionL->addHoraPico('16:00:00-19:30:00');

$objRestriccionMa = new Restriccion();
$objRestriccionMa->setDia(2);
$objRestriccionMa->addUltimoDigito(3);
$objRestriccionMa->addUltimoDigito(4);
$objRestriccionMa->addHoraPico('07:00:00-09:30:00');
$objRestriccionMa->addHoraPico('16:00:00-19:30:00');

$objRestriccionMi = new Restriccion();
$objRestriccionMi->setDia(3);
$objRestriccionMi->addUltimoDigito(5);
$objRestriccionMi->addUltimoDigito(6);
$objRestriccionMi->addHoraPico('07:00:00-09:30:00');
$objRestriccionMi->addHoraPico('16:00:00-19:30:00');

$objRestriccionJ = new Restriccion();
$objRestriccionJ->setDia(4);
$objRestriccionJ->addUltimoDigito(7);
$objRestriccionJ->addUltimoDigito(8);
$objRestriccionJ->addHoraPico('07:00:00-09:30:00');
$objRestriccionJ->addHoraPico('16:00:00-19:30:00');

$objRestriccionV = new Restriccion();
$objRestriccionV->setDia(5);
$objRestriccionV->addUltimoDigito(0);
$objRestriccionV->addUltimoDigito(9);
$objRestriccionV->addHoraPico('07:00:00-09:30:00');
$objRestriccionV->addHoraPico('16:00:00-19:30:00');

$objPicoPlaca = new PicoPlaca();
$objPicoPlaca->addRestriccion($objRestriccionL);
$objPicoPlaca->addRestriccion($objRestriccionMa);
$objPicoPlaca->addRestriccion($objRestriccionMi);
$objPicoPlaca->addRestriccion($objRestriccionJ);
$objPicoPlaca->addRestriccion($objRestriccionV);

$objComprobacion = new Comprobacion();

//-----------------
// PRIMERA PRUEBA
//-----------------

$objComprobacion->setPlaca('PSU-0380');
$objComprobacion->setFecha('2016-10-28');
$objComprobacion->setHora('09:00:00');
$objPicoPlaca->setComprobacion($objComprobacion);

echo "Primera prueba<br/>";
echo "El auto con placas ".$objComprobacion->getPlaca();
echo "<br/>";
if ($objPicoPlaca->comprobar() == 1)
	echo "No puede estar en la carretera";
else
	echo "Si puede estar en la carretera";
echo "<br/>";
echo "La fecha: ".$objComprobacion->getFecha();
echo "<br/>";
echo "A las: ".$objComprobacion->getHora()." horas";
echo "<hr/>";

//-----------------
// SEGUNDA PRUEBA
//-----------------

echo "Segunda prueba<br/>";
$objComprobacion->setPlaca('PSU-0380');
$objComprobacion->setFecha('2016-10-27');
$objComprobacion->setHora('09:00:00');
$objPicoPlaca->setComprobacion($objComprobacion);

echo "El auto con placas ".$objComprobacion->getPlaca();
echo "<br/>";
if ($objPicoPlaca->comprobar() == 1)
	echo "No puede estar en la carretera";
else
	echo "Si puede estar en la carretera";
echo "<br/>";
echo "La fecha: ".$objComprobacion->getFecha();
echo "<br/>";
echo "A las: ".$objComprobacion->getHora()." horas";
echo "<hr/>";

//-----------------
// TERCERA PRUEBA
//-----------------

echo "Tercera prueba<br/>";
$objComprobacion->setPlaca('PSU-0380');
$objComprobacion->setFecha('2016-10-14');
$objComprobacion->setHora('19:29:59');
$objPicoPlaca->setComprobacion($objComprobacion);

echo "El auto con placas ".$objComprobacion->getPlaca();
echo "<br/>";
if ($objPicoPlaca->comprobar() == 1)
	echo "No puede estar en la carretera";
else
	echo "Si puede estar en la carretera";
echo "<br/>";
echo "La fecha: ".$objComprobacion->getFecha();
echo "<br/>";
echo "A las: ".$objComprobacion->getHora()." horas";
echo "<hr/>";

//-----------------
// CUARTA PRUEBA
//-----------------

echo "Cuarta prueba<br/>";
$objComprobacion->setPlaca('PSU-0380');
$objComprobacion->setFecha('2016-10-30');
$objComprobacion->setHora('19:29:59');
$objPicoPlaca->setComprobacion($objComprobacion);

echo "El auto con placas ".$objComprobacion->getPlaca();
echo "<br/>";
if ($objPicoPlaca->comprobar() == 1)
	echo "No puede estar en la carretera";
else
	echo "Si puede estar en la carretera";
echo "<br/>";
echo "La fecha: ".$objComprobacion->getFecha();
echo "<br/>";
echo "A las: ".$objComprobacion->getHora()." horas";
echo "<hr/>";
?>