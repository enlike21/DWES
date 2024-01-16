<?php

    require_once("Vehiculo.php");
    require_once("Coche.php");

    $vehiculo1=new Vehiculo(4);
    $vehiculo1->setColor("<b>rojo</b>");
    $vehiculo1->setMarca("<b>Brumbrum marca</b>");

    $vehiculo1->toString();

    $coche1=new Coche(55,"1432 zzz");
    echo "<br>";
    $coche1->viajar(100);
    $coche1->setPlazas(4);
    $coche1->toString();


?>