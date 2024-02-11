<?php

    class Fotocopia extends Papel{

        public function __construct($largo, $alto, $dobleCara=false)
        {
            parent::__construct($largo, $alto,$dobleCara);
            self::$paginasGastadas++;
        }

        public function destruir(){
            self::$paginasRecicladas++;
        }

        public function calcularEspacio(){
            echo "Su superficie es ".$this->largo * $this->alto .  "<br>";
        }

        public function __toString()
        {
            if($this->getDobleCara()==false){
            echo parent::__toString();" No es doble cara<br>";
            }
            else{
                echo parent::__toString();" Es doble cara<br>";
            }
        }

    }

?>