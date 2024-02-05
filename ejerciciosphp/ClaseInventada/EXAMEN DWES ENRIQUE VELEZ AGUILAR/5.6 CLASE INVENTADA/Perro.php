<?php
require_once "Funciones.php";
class Perro extends AnimalDomestico {

    // Constructor para Perro
    public function __construct($nombre, $edad) {
        parent::__construct($nombre, $edad, "Perro");
    }

    public function ladrar() {
        echo "Guau! Guau!<br>";
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