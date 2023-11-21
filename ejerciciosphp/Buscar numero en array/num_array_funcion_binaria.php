<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: wheat;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        form {
            background-color: whitesmoke;
            border: solid 1px #ccc;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
            padding: 1rem;
            font-size: xx-large;
            margin-top: 1rem;
            font-weight: bold;
        }

        button{
            border-radius: 10px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
<h1>Búsqueda binaria</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="numero">Introduce el número a buscar:</label>
        <input type="number" name="numero" id="numero" required>
        <button type="submit">Buscar</button>
    </form>
    <?php
    $array = array(5, 10, 18, 23, 27, 43, 50);
    // Número que busco
    $numeroBuscado = $_POST['numero'];
    // Función
    function busqueda_Binaria($array, $inicio, $fin, $numeroBuscado) {
        if ($fin >= $inicio) {
            $medio = floor(($inicio + $fin) / 2);
            // Si el número es el valor del medio, lo devuelvo
            if ($array[$medio] == $numeroBuscado) {
                return $medio;
            }
            // Si el número es menor que el valor del medio, busco en la mitad izquierda del array
            if ($array[$medio] > $numeroBuscado) {
                return busqueda_Binaria($array, $inicio, $medio - 1, $numeroBuscado);
            }
            // Si el número es mayor que el valor del medio, busco en la mitad derecha del array
            return busqueda_Binaria($array, $medio + 1, $fin, $numeroBuscado);
        }
        // Si no se encuentra el número en el array, retornar -1
        return -1;
    }
    // Ejecuto la función
    $resultado = busqueda_Binaria($array, 0, count($array) - 1, $numeroBuscado);
    // Resultado
    if ($resultado == -1) {
        echo "El número no está en el array.";
    } else {
        echo "El número está en el índice $resultado y su posición es $resultado";
    }
    ?>
</body>
</html>