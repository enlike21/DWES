<?php
class Perro extends AnimalDomestico {

    // Constructor para Perro
    public function __construct($nombre, $edad) {
        parent::__construct($nombre, $edad, "Perro");
    }

    public function ladrar() {
        echo "Guau! Guau!<br>";
        echo "-----<br>";
    }
}
?>