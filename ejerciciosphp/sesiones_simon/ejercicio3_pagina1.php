<?php
session_start();

$coloresPosibles = ['red', 'blue', 'green', 'yellow'];
$patronColores = [];

for ($i = 0; $i < rand(2, 7); $i++) {
    $color = $coloresPosibles[array_rand($coloresPosibles)];
    $patronColores[] = $color;
}
$_SESSION['patronColores'] = $patronColores;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Colores - Página 1</title>
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
    <h1>Patrón de Colores</h1>

    <?php

    foreach ($patronColores as $color) {
        echo "<div class='color-box' style='background-color: $color;'></div>";
    }
    ?>

    <br>

    <form action="ejercicio3_pagina2.php" method="post">
        <button type="submit" name="continuar">Continuar al Juego</button>
    </form>
</body>
</html>
