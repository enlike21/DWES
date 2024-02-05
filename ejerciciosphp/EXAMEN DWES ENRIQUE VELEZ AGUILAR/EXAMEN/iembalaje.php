<?php

    interface Iembalaje{ //CREO QUE EL SETTER PARA CREAR LA VARIABLE VOLUMENENVOLTORIO Y PARA EL MARGEN

        public function __set($nombre,$valor);

        public function embalar($unidades); //FUNCION EMBALAR PARA LA CLASE LIBRO

    }

?>