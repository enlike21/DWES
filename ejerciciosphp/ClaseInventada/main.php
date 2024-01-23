<?php
include_once "AnimalDomestico.php";
include_once "Perro.php";
include_once "Gato.php";
include_once "Pajaro.php";

$perro = new Perro("Patán", 3);
$gato = new Gato("Don Gato", 2);
$pajaro = new Pajaro("Piolín", 1);

$perro->mostrarInformacion();
$perro->ladrar();

$gato->mostrarInformacion();
$gato->maullar();

$pajaro->mostrarInformacion();
$pajaro->cantar();

?>
