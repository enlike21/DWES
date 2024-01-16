<?php

    class Coche extends Vehiculo{

        private $matricula;
        private $kilometros;

        public function __construct($kilometros=0,$matricula="",$aparcado=true,$plazas=0)
        {
            parent::__construct($plazas,$aparcado);
            $this->kilometros = $kilometros;
            $this->setMatricula($matricula);
        }

        public function setMatricula($matricula){
            $matricula=strtoupper($matricula);
            $patron='/^[0-9]{4}[" "][^AEIÑOQU]{3}$/';
            $comprobacion=false;
            while($comprobacion==false){
            if (preg_match($patron, $matricula)){
                 $this->matricula=$matricula;
                 $comprobacion=true;
            } else {
                $this->matricula="";
            }
            return $this->matricula;
        }
        }

        public function getMatricula(){
            return $this->matricula;
        }

        public function puedeCircular(){
            $patron='/^[0-9]{4}[" "][^AEIÑOQU]{3}$/';
            if (preg_match($patron, $this->matricula)){
                $comprobacion=true;
           } else {
               $comprobacion=false;
           }
           return $comprobacion;
        }

        public function viajar($kilometros){
            $comprobacion=false;
            $aparcado=$this->isAparcado();
            while ($comprobacion==false){
                if($kilometros>=0 && $aparcado){
                    return $this->kilometros+=$kilometros;
                    $comprobacion=true;
                }
                else{
                    echo "Tiene que ser un valor positivo";
                }
            }
        }

        public function toString(){
            $plazas=$this->getPlazas();
            echo "Matricula del Coche: $this->matricula Kilometros: $this->kilometros Plazas: $plazas, etc";
        }

    }

?>