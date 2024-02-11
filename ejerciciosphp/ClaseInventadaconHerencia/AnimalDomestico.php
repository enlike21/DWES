<?php

class AnimalDomestico {
    private $nombre;
    private $edad;
    private $tipo;
    private $patas;

    // Constructor
    public function __construct($nombre, $edad, $tipo) {
        $this->nombre = $nombre;
        $this->setEdad($edad);
        $this->setTipo($tipo);
    }

    // Métodos GET
    public function getNombre() {
        return $this->nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getPatas() {
        return $this->patas;
    }

    // Métodos SET
    public function setNombre($nuevoNombre) {
        $this->nombre = $nuevoNombre;
    }

    public function setEdad($nuevaEdad) {
        if ($nuevaEdad >= 0) {
            $this->edad = $nuevaEdad;
        }
    }

    public function setTipo($nuevoTipo) {
        if ($nuevoTipo === "Perro" || $nuevoTipo === "Gato") {
            $this->patas = 4;
            $this->tipo = $nuevoTipo;
        } elseif ($nuevoTipo === "Pajaro") {
            $this->patas = 2;
            $this->tipo = $nuevoTipo;
        } else {
            $this->patas = 0;
            $this->tipo = null;
        }
    }

    public function mostrarInformacion() {
        if ($this->tipo) {
            echo "Nombre: " . $this->nombre . "<br>";
            echo "Edad: " . $this->edad . " años<br>";
            echo "Tipo: " . $this->tipo . "<br>";
            echo "Número de patas: " . $this->patas . "<br>";
        } else if ($this->tipo === null || $this->edad < 0) {
            echo "Información no disponible debido a que la edad o el tipo del animal, no son válido.<br>";
        }
    }
}

?>