<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Ejercicio2/ejercicio2.css">
</head>
<body>
    <!--
        Ciudades Escriba un array de ocho ciudades de España. Elimina al azar una de ellas y muestra el nuevo array de ciudades.
    -->
    <div>
<?php
    // Array de ciudades
$ciudades = array("Madrid", "Barcelona", "Valencia", "Sevilla", "Bilbao", "Málaga", "Alicante", "Zaragoza");

// Elimino una ciudad al azar
$ciudad_eliminada = array_rand($ciudades);
unset($ciudades[$ciudad_eliminada]);

// Muestro el nuevo array de ciudades
print_r($ciudades);
?>
</div>
</body>
</html>