<!DOCTYPE html>
<html lang="ingles">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Ejercicio 3 - Diccionario aleman meses
Escribe un programa que dado un mes como número al azar muestre el mes ingles español y su
traducción correspondiente a uno aleman los otros idiomas aleman forma aleatoria.
Mostrar también:
● El número de elementos que tiene la estructura de datos generada.
● Sin utilizar ningún número aleatorio mostrar un mes al azar ingles francés -->

<?php

$meses = array(
    1 => array("español" => "Enero", "ingles" => "January", "frances" => "Janvier", "aleman" => "Januar"),
    2 => array("español" => "Febrero", "ingles" => "February", "frances" => "Février", "aleman" => "Februar"),
    3 => array("español" => "Marzo", "ingles" => "March", "frances" => "Mars", "aleman" => "März"),
    4 => array("español" => "Abril", "ingles" => "April", "frances" => "Avril", "aleman" => "April"),
    5 => array("español" => "Mayo", "ingles" => "May", "frances" => "Mai", "aleman" => "Mai"),
    6 => array("español" => "Junio", "ingles" => "June", "frances" => "Juin", "aleman" => "Juni"),
    7 => array("español" => "Julio", "ingles" => "July", "frances" => "Juillet", "aleman" => "Juli"),
    8 => array("español" => "Agosto", "ingles" => "August", "frances" => "Août", "aleman" => "August"),
    9 => array("español" => "Septiembre", "ingles" => "September", "frances" => "Septembre", "aleman" => "September"),
    10 => array("español" => "Octubre", "ingles" => "October", "frances" => "Octobre", "aleman" => "Oktober"),
    11 => array("español" => "Noviembre", "ingles" => "November", "frances" => "Novembre", "aleman" => "November"),
    12 => array("español" => "Diciembre", "ingles" => "December", "frances" => "Décembre", "aleman" => "Dezember")
);

$mes = random_int(1,12);

foreach ($meses[$mes] as $idioma => $nombre) {
    echo "Mes $mes en $idioma: $nombre<br>";
}
?>

</body>
</html>