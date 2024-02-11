<?php
class Serie extends Entregable{

    private $titulo;
    private $numero_de_temporadas;
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

    public function getNumeroTemporadas(){
        return $this->numero_de_temporadas;
    }

    public function setNumeroTemporadas($numeroTemporadas){
        return $this->numero_de_temporadas = $numeroTemporadas;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function setGenero($genero){
        return $this->genero = $genero;
    }

    public function toString(){
        if ($this->entregado==false){
        $mensaje="El titulo de la Serie es $this->titulo, tiene un numero de temporadas de $this->numero_de_temporadas, el genero es $this->genero, y no está entregada";
        echo $mensaje;
        }
        else{
        $mensaje="El titulo de la Serie es $this->titulo, tiene un numero de temporadas de $this->numero_de_temporadas, el genero es $this->genero, y está entregada";
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