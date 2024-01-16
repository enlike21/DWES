<?php
class Vehiculo
{
    private $marca;
    private $color;
    private $plazas;
    private $aparcado;

    public function __construct($plazas = 0,$aparcado=true)
    {
        $this->setPlazas($plazas);
        $this->aparcado = $aparcado;
    }

    public function setPlazas($plazas)
    {
        $comprobacion = false;
        while ($comprobacion == false) {
            if ($plazas >= 0) {
                return $this->plazas = $plazas;
                $comprobacion = true;
            } else {
                echo "Tiene que ser de 0 o más plazas";
            }
        }
    }

    public function setColor($color)
    {

        return $this->color = $color;
    }
    public function setMarca($marca)
    {

        return $this->marca = $marca;
    }
    public function getMarca()
    {

        return $this->marca;
    }
    public function getPlazas()
    {

        return $this->plazas;
    }
    public function getColor()
    {

        return $this->color;
    }
    public function Aparcar()
    {
        return $this->aparcado = true;
    }
    public function Arrancar()
    {
        return $this->aparcado = false;
    }

    public function isAparcado()
    {
        return $this->aparcado;
    }

    public function toString()
    {
        if ($this->aparcado == true) {
            echo "El color del vehículo es: $this->color, su numero de plazas es $this->plazas, su marca es $this->marca y está aparcado";
        } else {
            echo "El color del vehículo es: $this->color, su numero de plazas es $this->plazas, su marca es $this->marca y no está aparcado";
        }
    }
}
