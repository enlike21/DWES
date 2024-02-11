<?php

    class Cliente{
        
        private $nombre;
        private $producto;
        public $apodo;
        private static $clientela;

        public function __construct($nombre,$producto="")
        {
            $this->nombre=$nombre;
            $this->producto=$producto;
            self::$clientela++;
            echo $this->nombre.", creado<br>";
        }

        public function eliminarcliente(){
            $this->nombre="";
            $this->producto="";
            self::$clientela--;
        }

        public function comprar($prod){
            $this->producto=$prod;
        }

        public function getProducto(){
            return $this->producto;
        }

        public function mostrar(){
            echo "$this->nombre es conocido como $this->apodo<br>";
        }




    }

?>