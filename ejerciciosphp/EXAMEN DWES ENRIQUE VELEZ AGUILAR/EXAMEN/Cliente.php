<?php

class Cliente
{ //CLASE CLIENTE CON SUS ATRIBUTOS DE CLASE

    private $nombre;
    private $producto;
    public $apodo;
    private static $clientela;

    public function __construct($nombre, $producto = "") //CREO EL CONSTRUCTOR CON SU NOMBRE Y PRODUCTO VACIO POR DEFECTO
    {
        $this->nombre = $nombre;
        $this->producto = $producto;
        self::$clientela++;
        echo $this->nombre . ", creado<br>";
    }

    public function eliminarcliente()
    { //FUNCION PARA ELIMINAR EL CLIENTE
        $this->nombre = "";
        $this->producto = "";
        self::$clientela--;
    }

    public function comprar($prod)
    { //FUNCION PARA COMPRAR
        $this->producto = $prod;
    }

    public function getProducto()
    { //FUNCION PARA OBTENER EL PRODUCTO COMPRADO
        return $this->producto;
    }

    public function mostrar()
    { //FUNCION PARA MOSTRAR EL NOMBRE Y EL APODO DEL CLIENTE
        echo "$this->nombre es conocido como $this->apodo<br>";
    }

    public function getClientela()
    { //FUNCION PARA VER EL NUMERO DE CLIENTELA QUE TIENE LA TIENDA
        return self::$clientela;
    }
}
