<?php
require_once "Funciones.php";
class Gato extends AnimalDomestico implements Funciones {

    // Constructor para Gato
    public function __construct($nombre, $edad) {
        parent::__construct($nombre, $edad, "Gato");
    }

    public function maullar() {
        echo "Miau! Miau!<br>";
        echo "-----<br>";
    }

    public function comer() {
        echo "{$this->getNombre()} está comiendo <br>.";
    }

    public function dormir() {
        echo "{$this->getNombre()} está durmiendo <br>.";
    }

    public function jugar() {
        echo "{$this->getNombre()} está jugando <br>.";
    }

}

?>