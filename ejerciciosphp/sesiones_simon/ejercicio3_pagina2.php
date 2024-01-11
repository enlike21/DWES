<?php
session_start();

$coloresPosibles = ['red', 'blue', 'green', 'yellow'];


if (!isset($_SESSION['elecciones'])) {
    $_SESSION['elecciones'] = [];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $eleccion = isset($_POST['eleccion']) ? $_POST['eleccion'] : [];


    $patronColores = $_SESSION['patronColores'];
    $_SESSION['elecciones'] = array_merge($_SESSION['elecciones'], $eleccion);

    $eleccionesActuales = array_slice($_SESSION['elecciones'], 0, count($patronColores));

    if ($eleccionesActuales == $patronColores) {
        echo "<p>Correcto! Has completado el patrón.</p>";
    } else {

        echo "<p>Patrón actual del jugador: ";
        foreach ($eleccionesActuales as $color) {
            echo "<div class='color-box' style='background-color: $color;'></div>";
        }
        echo "</p>";

        echo "<p>Patrón original: ";
        foreach ($patronColores as $color) {
            echo "<div class='color-box' style='background-color: $color;'></div>";
        }
        echo "</p>";

        echo "<p>Incorrecto! Fin del juego.</p>";

        unset($_SESSION['patronColores']);
        unset($_SESSION['elecciones']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Colores - Página 2</title>
    <style>
        .color-box {
            display: inline-block;
            width: 50px;
            height: 50px;
            margin: 5px;
        }
    </style>
</head>

<body>
    <h1>Juego de Colores</h1>
    <p>Reproduce el patrón de colores:</p>

    <form method="post">
        <?php
        foreach ($coloresPosibles as $color) {
            echo "<button type='submit' name='eleccion[]' value='$color' style='background-color: $color;' class='color-box'></button>";
        }
        ?>
    </form>
</body>

</html>