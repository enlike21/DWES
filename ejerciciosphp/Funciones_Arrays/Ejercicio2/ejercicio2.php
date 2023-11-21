<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ejercicio2.css">
</head>

<body>
    <div>
        <!--Escriba un programa que cada vez que se ejecute muestre dos números entre 1 y 10 al azar, e indique: 
● La suma de dichos números 
● La multiplicación de dichos números. -->

        <?php
        function generarNumeros() //Función para generar los números aleatorios
        {
            $num1 = rand(1, 10);
            $num2 = rand(1, 10);
            return array($num1, $num2);
        }

        function mostrarResultados($num1, $num2) //Función para mostrar los resultados
        {
            $suma = $num1 + $num2;
            $multiplicacion = $num1 * $num2;
            echo "<h2>" . "Primer número: " . $num1 . "</h2>";
            echo "<h2>" . "Segundo número: " . $num2 . "</h2>";
            echo "<h2>" . "Suma: " . $suma . "</h2>";
            echo "<h2>" . "Multiplicación: " . $multiplicacion . "</h2>";
        }

        // Genero los números y muestro los resultados
        $numeros = generarNumeros();
        mostrarResultados($numeros[0], $numeros[1]);
        ?>
    </div>
</body>

</html>