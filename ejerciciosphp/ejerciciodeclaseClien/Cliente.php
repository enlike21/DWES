<?php

    class Cliente{
        public $nombre;
        private $apellido;
        private $edad;
        private $descuento;
        private $porcentaje;

        public function __construct($nombre,$apellido)
        {
            $this->nombre = $nombre;
            $this->apellido= $apellido;
        }

        public function getNombre(){
           return $this->nombre;
        }

        public function getApellido(){
           return $this->apellido;
        }
        public function getEdad(){
           return $this->edad;
        }

        public function getDescuento(){
           return $this->descuento;
        }
        public function getPorcentaje(){
           return $this->porcentaje;
        }

        public function setNombre($nombrenuevo){
            return $this->nombre=$nombrenuevo;
        }
        public function setApellido($apellidonuevo){
            return $this->apellido=$apellidonuevo;
        }
        public function setEdad($edadnueva){
            return $this->edad=$edadnueva;
        }
        public function setDescuento($descuentonuevo){
            return $this->descuento=$descuentonuevo;
        }
        public function setNombre($nombre){
            return $this->nombre=$nombre;
        }




    }


?>