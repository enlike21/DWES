<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ejercicio1.css">
</head>

<body>

    <!--Realizar un programa que obtenga los números impares entre 1 y 50. Una vez obtenido el resultado,  comprobar cuales son números primos.
La evaluación de los números impares y primos se hará con funciones.-->

<div>
    <?php
    $num_impares = array();

    function num_impares() //Función para generar los números impares
    {
        global $num_impares;
        for ($i = 49; $i >= 1; $i -= 2) {
            array_push($num_impares, $i);
        }
        echo "<h3>Los números impares del 50 al 1 son:</h3>";
        foreach ($num_impares as $numero) {
            echo $numero . " ";
        }
        echo "<br><br>";
        echo "<h3>Los números primos son:</h3>";
        mostrar_primos($num_impares);
    }

    function mostrar_primos($num_impares){ //Función para mostrar los números primos
    
        foreach ($num_impares as $numero) {
            if (es_primo($numero)) {
                echo $numero . " ";
            } else {
                echo "&nbsp;&nbsp;";
            }
    }
}

    function es_primo($numero) //Funcion para saber si un numero es primo
    {
        if ($numero < 2) {
            return false;
        }

        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i == 0) {
                return false;
            }
        }

        return true;
    }

    num_impares();
    ?>
</div>
</body>

</html>