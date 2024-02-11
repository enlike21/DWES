<?php
    require_once "Papel.php";
    class Fotocopia extends Papel{ /* Heredo de papel sus atributos y funciones */

        public function __construct($largo, $alto, $dobleCara=false) /* Creo el constructor */
        {
            parent::__construct($largo, $alto,$dobleCara);
            self::$paginasGastadas++;
        }

        public function destruir(){ /* FUNCION DESTRUIR QUE AUMENTA EL NUMERO DE PAGINAS RECICLADAS */
            self::$paginasRecicladas++;
        }

        public function calcularEspacio(){ /* LA FUNCION PARA CALCULAR EL ESPACIO DE LA FOTOCOPIA */
            echo "Su superficie es ".$this->largo * $this->alto .  "<br>";
        }

        public function __toString() /* FUNCION TOSTRING PARA MANDAR LA INFORMACION DE LO QUE CONTIENE EL OBJETO AL USUARIO */
        {
            if($this->getDobleCara()==false){
            echo parent::__toString();
            echo " y no es doble cara";
            return "";
        }
        else{
            echo parent::__toString(); 
            echo " y es doble cara";
            return "";
            }
        }

    }

?>