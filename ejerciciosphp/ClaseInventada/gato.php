<?php
class Gato extends AnimalDomestico {

    // Constructor para Gato
    public function __construct($nombre, $edad) {
        parent::__construct($nombre, $edad, "Gato");
    }

    public function maullar() {
        echo "Miau! Miau!<br>";
        echo "-----<br>";
    }
}

?>