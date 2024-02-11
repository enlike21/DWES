<?php
require_once "iembalaje.php";

class Libro extends Papel implements Iembalaje
{ //HEREDO DE PAPEL E IMPLEMENTO LA INTERFAZ IEMBALAJE

    public $titulo;

    private $paginas;
    private $ancho;

    public function __construct($largo, $alto, $paginas, $doblecara = true) //CONSTRUCTOR CON LAS VARIABLES DE LA HERENCIA DE PAPEL
    {
        parent::__construct($largo, $alto, $doblecara);
        self::$paginasGastadas+=$paginas;
        $this->paginas = $paginas;
        $this->ancho = $paginas / 100;
    }

    public function calcularEspacio()
    { //FUNCION PARA CALCULAR EL ESPACIO QUE OCUPA EL LIBRO
        echo "Su superficie es " . $this->largo * $this->alto * $this->ancho .  "<br>";
    }

    public function eliminarlibro()
    { //FUNCION PARA ELIMINAR LIBRO
        self::$paginasRecicladas = $this->paginas;
    }

    public function __toString()  /* FUNCION TOSTRING PARA MANDAR LA INFORMACION DE LO QUE CONTIENE EL OBJETO AL USUARIO */
    {
        echo "Libro de $this->paginas páginas, titulado $this->titulo<br>";
    }

    public function embalar($unidades) //FUNCION DE LA INTERFAZ IEMBALAJE EN LA QUE PODEMOS EMBALAR LOS LIBROS
    {
        $calcularLargo = $this->largo + $this->margen * 2;
        $calcularAlto = $this->alto + $this->margen * 2;
        $calcularAncho = ($this->ancho * $unidades) + $this->margen * 2;
        $valor = $calcularAlto * $calcularAncho * $calcularLargo;
        return $this->__set("volumenEnvoltorio", $valor);
    }

    public function __set($nombre, $valor)
    { //GETTERS Y SETTERS MAGICOS PARA CREAR LA VARIABLE VOLUMENENVOLTORIO
        return $this->$nombre = $valor;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
