<?php

    class Planeta{
        private static $num_planeta=0;
        private $nombre;
        private $radio;
        private $densidad;
        private $sistema_solar;
        private $num_aliens;
        
        public function __construct($nombre,$radio,$densidad)
        {
            $this->nombre=$nombre;
            $this->radio=$radio;
            $this->densidad=$densidad;
            self::$num_planeta++;
        }

        public function setSistemaSolar($sistema_solar){
            if($sistema_solar==true){
                if($this->nombre=="Tierra"||$this->nombre=="Marte"){
                    $this->sistema_solar=$sistema_solar;
                }
            }
        }

        public function getSistemaSolar(){
            return $this->sistema_solar;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre; 
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setRadio($radio){
            $this->radio=$radio;
        }

        public function getRadio(){
            return $this->radio;
        }

        public function setDensidad($densidad){
            $this->densidad=$densidad;
        }

        public function getDensidad(){
            return $this->densidad;
        }

        public function crearAliens(){
            $this->num_aliens=random_int(0, 100);
        }

        public function getNumAliens(){
            return $this->num_aliens;
        }

        public function toString(){
            if ($this->sistema_solar==true){
            echo "El planeta se llama: $this->nombre, tiene un radio de $this->radio, tiene una densidad de $this->densidad, es un planeta del sistema solar y tiene un numero de aliens de $this->num_aliens";
            }
            else{
                echo "El planeta se llama: $this->nombre, tiene un radio de $this->radio, tiene una densidad de $this->densidad, <b>no</b> es un planeta del sistema solar y tiene un numero de aliens de $this->num_aliens";
            }
        }


        
    }

?>