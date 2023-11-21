<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table ,tr, th,td{
            border: 1px solid #ccc;
            background-color: antiquewhite;
            border-radius: 5px;
        }
        td{
            background-color: white;
        }
        body{
            background-color: beige;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php
    $lista1 = ["juan", 21, "maria", 19, "pedro", 24, "antonio", 30, "carmen", 24, "carlos", 26, "lucia", 22];
    $lista2 = ["jaime", 27, "luisa", 21, "aitor", 33, "macarena", 22, "maria", 27, "pedro", 28, "juan", 24];

    $listacompleta = array();

    $listacompleta = unirarrays($lista1,$lista2);
    
    imprimirtabla ($lista1);
    imprimirtabla ($lista2);
    imprimirtablaunida ($listacompleta);
    ?>

</body>
</html>
<?php

//Funciones

function imprimirtablaunida($listacompleta){
    echo "<h1>Tabla de arrays unidos</h1>";
    echo "<table>";
    echo "<tr>";
    echo "<th colspan=2>Fila 1</th>";
    echo "<th colspan=2>Fila 2</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Edad</th>";
    echo "<th>Nombre</th>";
    echo "<th>Edad</th>";
    echo "</tr>";
    foreach ($listacompleta as $fila) { //Imprimimos los valores del array en formato de tabla de dos en dos valores de los dos arrays
        echo "<tr>";
        foreach ($fila as $elemento) {
            echo "<td>" . $elemento . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function imprimirtabla ($lista){ //Imprimimos los valores del array en formato de tabla de dos en dos valores para que tengamos el nombre y la edad en conjunto.
    echo "<h1>Tabla de arrays individuales</h1>";
    echo "<table>";
    echo "<th>Nombre</th>";
    echo "<th>Edad</th>";
    for ($i = 0;$i<count($lista);$i+=2) {
        echo "<tr>";
        echo "<td>" . $lista[$i]."</td>";
        echo "<td>" . $lista[$i+1]."</td>";
        echo "</tr>";
}
    echo "</table>";
}

function unirarrays($lista1, $lista2){ //Para esta funcion he creado un nuevo array bidimensional en el que vamos guardando los valores de dos en dos de los dos arrays originales
for ($i = 0; $i < count($lista1); $i += 2) {
    $fila = array($lista1[$i], $lista1[$i + 1], $lista2[$i], $lista2[$i + 1]);
    $listacompleta[] = $fila;
}
return $listacompleta;
}

?>