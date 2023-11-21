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

function ordenarPorIntercambio($arr) {
    $tamanio = count($arr);
    for ($i = 0; $i < $tamanio - 1; $i++) { //Recorro el array
        for ($j = 0; $j < $tamanio - $i - 1; $j++) { //Recorro el array con un valor siempre delante de la variable i, y comparo
            if ($arr[$j] > $arr[$j + 1]) {
                intercambiar($arr, $j, $j + 1);
            }
        }
    }
    return $arr;
}

function intercambiar(&$arr, $i, $j) { //Intercambio los valores
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

if (isset($_POST['boton'])) {
    $array_copia = ordenarPorIntercambio($array_copia);
    echo "<br>";
    echo "El array ordenado es: " . implode(", ", $array_copia);
    echo "<br><br>";
    echo "El array original era: " . implode(", ", $array);
}
    ?>
</body>

</html>