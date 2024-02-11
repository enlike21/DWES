<?php
    require_once "iembalaje.php";

    class Libro extends Papel implements Iembalaje{

        public $titulo;

        private $paginas;
        private $ancho=$this->paginas/100;
        
        public function __construct($largo,$alto,$paginas,$doblecara=true)
        {
            parent::__construct($largo,$alto,$doblecara);
            self::$paginasGastadas++;
            $this->paginas=$paginas;
        }

        public function calcularEspacio(){
            echo "Su superficie es ".$this->largo * $this->alto * $this->ancho .  "<br>";
        }

        public function eliminarlibro(){
            self::$paginasRecicladas=$this->paginas;
        }

        public function __toString()
        {
            echo "Libro de $this->paginas páginas, titulado $this->titulo<br>";
        }

        public function embalar($unidades)
        {
            $calcularLargo=$this->largo + $this->margen*2;
            $calcularAlto=$this->alto + $this->margen*2;
            $calcularAncho= ($this->ancho*$unidades)+$this->margen*2;
            $valor=$calcularAlto*$calcularAncho*$calcularLargo;
           return $this->__set("volumenEnvoltorio",$valor);
        }

        public function __set($nombre,$valor){
            return $this->$nombre=$valor;
        }

        public function __get($name)
        {
            $this->$name;
        }

    }

?>