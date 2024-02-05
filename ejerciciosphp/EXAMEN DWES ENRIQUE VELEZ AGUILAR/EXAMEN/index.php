<?php

//REQUERIMIENTOS PARA QUE FUNCIONE
require_once "iembalaje.php";
require_once "Cliente.php";
require_once "Papel.php";
require_once "Libro.php";
require_once "Fotocopia.php";

//CREO CLIENTE Y CREO LA FOTOCOPIA, HAGO LO QUE ME PIDE EL EXAMEN QUE ES COMPRAR, CALCULAR EL ESPACIO Y MOSTRAR LA INFORMACION DE FOTOCOPIA
echo "<b>CREO CLIENTE Y FOTOCOPIA</b><br>";
echo "<br>";
$clientePepe = new Cliente("Pepe");
$fotocopia1 = new Fotocopia(10, 20);
$fotocopia1->calcularEspacio();
$clientePepe->comprar($fotocopia1);
$fotocopia1->__toString();
echo "<br>";

//MUESTRO LAS PAGINAS GASTADAS, RECICLADAS Y LA CLIENTELA TOTAL
echo "Las paginas gastadas son: " . $fotocopia1->getPaginasGastadas() . "<br>";
echo "Las paginas recicladas son: " . $fotocopia1->getPaginasRecicladas() . "<br>";
echo "La clientela total son: " . $clientePepe->getClientela() . "<br>";
echo "<br>";
echo "<b>ELIMINO CLIENTE Y FOTOCOPIA</b><br>";
echo "<br>";

//ELIMINO CLIENTE Y DESTRUYO FOTOCOPIA
$clientePepe->eliminarcliente();
$fotocopia1->destruir();

//MUESTRO LAS PAGINAS GASTADAS, RECICLADAS Y LA CLIENTELA TOTAL
echo "Las paginas gastadas son: " . $fotocopia1->getPaginasGastadas() . "<br>";
echo "Las paginas recicladas son: " . $fotocopia1->getPaginasRecicladas() . "<br>";
echo "La clientela total son: " . $clientePepe->getClientela() . "<br><br>";
echo "<b>CREO LIBRO Y CLIENTE</b><br>";
echo "<br>";
//CREO UN LIBRO, LE AÑADO UN TITULO, LO EMBALO Y CREO UN CLIENTE QUE COMPRA EL LIBRO
$libro1 = new Libro(12, 15, 200);
$libro1->titulo = "Quijote";
$libro1->__set("margen",10);
$libro1->embalar(2);
$libro1->__get("volumenEnvoltorio");
$clienteJuan = new Cliente("Juan");
$clienteJuan->comprar($libro1);
echo "<br>";

//MUESTRO LAS PAGINAS GASTADAS, RECICLADAS Y LA CLIENTELA TOTAL
echo "Las paginas gastadas son: " . $libro1->getPaginasGastadas() . "<br>";
echo "Las paginas recicladas son: " . $libro1->getPaginasRecicladas() . "<br>";
echo "La clientela total son: " . $clienteJuan->getClientela() . "<br>";
