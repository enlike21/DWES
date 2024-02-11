<?php

    require_once "iembalaje.php";
    require_once "Cliente.php";
    require_once "Papel.php";
    require_once "Libro.php";
    require_once "Fotocopia.php";

    $clientePepe=new Cliente("Pepe");
    $fotocopia1=new Fotocopia(10,20);
    $fotocopia1->calcularEspacio();
    $clientePepe->comprar($fotocopia1);
    $fotocopia1->__toString();

?>