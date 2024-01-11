<?php

include_once "Persona.php";

$persona1 = new Persona("Juan", "Perez", 25);

echo "Nombre completo: " . $persona1->nombreCompleto() . "<br>";
echo "Edad: " . $persona1->getEdad() . " años<br>";
echo "¿Es mayor de edad? " . ($persona1->mayorEdad() ? "Sí" : "No") . "<br>";

$persona1->setEdad(17);
echo "Nueva edad: " . $persona1->getEdad() . " años<br>";
echo "¿Es mayor de edad? " . ($persona1->mayorEdad() ? "Sí" : "No") . "<br>";
?>
