<?php

class Papel //CREO LA CLASE PAPEL CON SUS DIFERENTES ATRIBUTOS
{

    protected static $paginasGastadas = 0;
    protected static $paginasRecicladas = 0;
    private $dobleCara;
    protected $alto;
    protected $largo;

    public function __construct($alto, $largo, $dobleCara) //CREO EL CONSTRUCTOR
    {
        $this->alto = $alto;
        $this->largo = $largo;
        $this->dobleCara = $dobleCara;
    }

    public function calcularEspacio() //FUNCION VACIA PARA CALCULAR EL ESPACIO, SE CREARÁ EN LAS SUBCLASES
    {
    }

    public function getDobleCara() //GET DOBLE CARA, PARA VER SI ES FALSE O TRUE
    {
        return $this->dobleCara;
    }

    public function __toString() //TOSTRING PARA MOSTRAR LA INFORMACION AL USUARIO
    {
        return "Se usa un papel de tamaño (alto x largo)" . $this->alto * $this->largo;
    }

    public function getPaginasGastadas() //GETTERS DE PAGINAS GASTADAS Y RECICLADAS
    {
        return self::$paginasGastadas;
    }

    public function getPaginasRecicladas()
    {
        return self::$paginasRecicladas;
    }
}
