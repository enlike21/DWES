<?php
class Pajaro extends AnimalDomestico {

    // Constructor para Pajaro
    public function __construct($nombre, $edad) {
        parent::__construct($nombre, $edad, "Pajaro");
    }

    public function cantar() {
        echo "Pío! Pío!<br>";
        echo "-----<br>";
    }
}
?>