<?php
include_once "AnimalDomestico.php";

$cambio = new AnimalDomestico("Buddy", 3, "Perro");
$gato = new AnimalDomestico("Whiskers", 2, "Gato");
$pajaro = new AnimalDomestico("Tweetie", 1, "Pajaro");


echo "<br><b>Información inicial:</b><br><br>";
$cambio->mostrarInformacion();
$gato->mostrarInformacion();
$pajaro->mostrarInformacion();


$cambio->setTipo("Alpaca"); 
$cambio->setNombre("Flappy");
$cambio->setEdad(2);

echo "<br><b>Información actualizada:</b><br><br>";
$cambio->mostrarInformacion();
$gato->mostrarInformacion();
$pajaro->mostrarInformacion();

?>
