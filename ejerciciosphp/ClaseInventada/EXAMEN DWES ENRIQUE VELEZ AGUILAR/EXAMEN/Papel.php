<?php

    class Papel{

        protected static $paginasGastadas=0;
        protected static $paginasRecicladas=0;
        private $dobleCara;
        protected $alto;
        protected $largo;

        public function __construct($alto, $largo, $dobleCara)
        {
            $this->alto=$alto;
            $this->largo=$largo;
            $this->dobleCara=$dobleCara;
        }

        public function calcularEspacio(){}

        public function getDobleCara(){
            return $this->dobleCara;
        }

        public function __toString()
        {
            echo "Se usa un papel de tamaño (alto x largo)". $this->alto * $this->largo."<br>";
        }

    }

?>