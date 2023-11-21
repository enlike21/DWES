<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de un triángulo</title>
    <style>
        fieldset {
            border: 1px solid;
           margin-right: 100rem;
           background-color: #c0c0c0;
        }
        legend{
            background-color: white;
            border: 1px solid;
        }
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        fieldset {
            background-color: darkseagreen;
        }
        <?php endif; ?>
    </style>
</head>

<body>
    <!--  4.-Realiza otro ejercicio que para 2 variables, $base y $altura, asigne a otra variable, $area, el área del triángulo. A continuación te deberá mostrar el siguiente mensaje:

El área del triángulo cuya base es $base y altura $altura es: $area.

Los datos de entrada se introducirán a mediante un formulario. Habrá que cambiar el color del texto, del fondo de la página y deberá tener el siguiente texto:

CALCULAR ÁREA TRIÁNGULO

Escribe la base:      

Escribe la altura:      

El título de la página será: Área de un triángulo. -->

    <h1>Ejercicio 4</h1>

    <!--Creamos un formulario en el que introducimos el valor de la base y la altura para calcular el área-->
    <h2>CALCULAR ÁREA DEL TRIÁNGULO</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend><b>Introduce la base y la altura</b></legend>
            <label for="base">Escribe la base:</label>
            <input type="number" name="base" id="base">
            <br>
            <label for="altura">Escribe la altura:</label>
            <input type="number" name="altura" id="altura">
            <br>
            <br>
            <input type="submit" value="Calcular">
        </fieldset>
    </form>
    <br>

    <?php
    $base = 0;
    $altura = 0;
    //Recogemos el valor de base y altura del formulario y las guardamos en variables, luego hacemos un if que compruebe si se han introducido los datos correctamente.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = intval($_POST["base"]);
        $altura = intval($_POST["altura"]);
        if ($base <= 0 || $altura <= 0) {
            echo "Introduce un número entero";
        } else {
            $area = ($base * $altura) / 2;
            echo "El área del triángulo cuya base es: $base , su altura: $altura y el área es: $area";
        }
    }


    ?>


</body>

</html>