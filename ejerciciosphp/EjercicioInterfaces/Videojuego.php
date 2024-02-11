<?php

    class Videojuego extends Entregable{
        private $titulo;
        private $horas_estimadas;
        private $entregado;
        private $genero;

        public function __construct($entregado=false)
        {
            $this->entregado=$entregado;
        }

        public function getTitulo(){
            return $this->titulo;
        }
        
        public function setTitulo($titulo){
            return $this->titulo = $titulo;
        }

        public function getHorasEstimadas(){
            return $this->horas_estimadas;
        }

        public function setHorasEstimadas($horasEstimadas){
            return $this->horas_estimadas = $horasEstimadas;
        }

        public function getGenero(){
            return $this->genero;
        }
    
        public function setGenero($genero){
            return $this->genero = $genero;
        }

        public function toString(){
            if ($this->entregado==false){
            $mensaje="El titulo del Videojuego es $this->titulo, tiene una duración de $this->horas_estimadas, el genero es $this->genero, y no está entregada";
            echo $mensaje;
            }
            else{
            $mensaje="El titulo de la Serie es $this->titulo, tiene un numero de temporadas de $this->horas_estimadas, el genero es $this->genero, y está entregada";
            echo $mensaje;
            }
        }

        public function entregar(){
            return $this->entregado=true;
        }
    
        public function devolver(){
            return $this->entregado=false;
        }
    
        public function isEntregado(){
            if($this->entregado=true){
                echo "Esta entregado";
            } else{
                echo "No está entregado";
            }
        }

    }

?>