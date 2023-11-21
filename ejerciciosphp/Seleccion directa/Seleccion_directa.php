<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: antiquewhite;
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: solid 1px #ccc;
            border-radius: 10px;
        }
        button{
            background-color: darkseagreen;
            padding: 1rem;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button type="submit" value="Ordenación directa" name="boton">Ordenar</button>
    </form>

    <?php
    $array = [50, 23, 18, 10, 27, 43, 5];
    $array_copia = $array;

    function seleccion_directa($array)
    {
        $tamanio = count($array);
        for ($i = 0; $i < $tamanio - 1; $i++) { /* Recorro el array y relleno la variable minimo */
            $minimo = $i;
            for ($j = $i + 1; $j < $tamanio; $j++) {/* Recorro el array con una itenerancia de +1 para ir comprobando con las demas variables */
                if ($array[$j] < $array[$minimo]) { /* Si es menor, se le añade el valor del array en ese momento a la variable minimo */
                    $minimo = $j;
                }
            }
            if ($minimo != $i) { /* Intercambio posiciones */
                $temporal = $array[$i];
                $array[$i] = $array[$minimo];
                $array[$minimo] = $temporal;
            }
        }
        return $array;
    }

    if (isset($_POST['boton'])) { /* Una vez pulsado el botón, muestro por pantalla */
        $array_copia = seleccion_directa($array_copia);
        echo "<br>";
        echo "El array ordenado es: " . implode(", ", $array_copia);
        echo "<br><br>";
        echo "El array original era: " . implode(", ", $array);
    }
    ?>
</body>

</html>