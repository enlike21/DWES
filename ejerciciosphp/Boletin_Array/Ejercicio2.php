<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.1">
    <title>Document</title>
    <style>
        body{
            background-color: beige;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            justify-content: center;
        }
        div{
            padding: 1rem;
            border: 5px solid black;
            border-radius: 10px;
            background-color: antiquewhite;
        }
    </style>
</head>
<body>

<!-- Escribe un programa que genere 6 números aleatorios de 1 al 6 y los guarde en un array.
Una vez generado el array:
● Mostrar cuántas veces aparece cada uno de los valores, del 1 al 6, en el array
generado.
● Obtener otro número al azar entre 1 y 6. Con ese número obtenido comprobar si se
encuentra en el array generado y en caso de que así sea mostrar todos los índices
donde aparezca ese número.
● Mostrar el array original ordenada de mayor a menor.
● Mostrar el array sin valores duplicados y sin huecos en los índices. -->
<div>
 <?php
 
    $array_num_aleatorios = array(random_int(1,6),random_int(1,6),random_int(1,6),random_int(1,6),random_int(1,6),random_int(1,6));
    $array_count = array_count_values($array_num_aleatorios); //Esta funcion, cuenta el numero de valores que se repiten dentro de el array

// Ejecuto las funciones

    mostrar_array($array_num_aleatorios); 
    contar_apariciones($array_count);
    buscar_num_aleatorio($array_num_aleatorios);
    array_ordenado($array_num_aleatorios);
    eliminar_duplicados($array_num_aleatorios)

    ?>

</div>
</body>
</html>
<?php
function mostrar_array ($array){
    echo "<h3>Los números del array son: </h3>";
    foreach ($array as $elementos){ //Recorro el array para mostrar todos los elementos que contiene
        echo $elementos.", ";
    }
}

function contar_apariciones ($array_count){
    echo "<h3>Las apariciones de numeros en el array son: </h3>";
for($i=1;$i<7;$i++){
    echo "El valor ". $i . " aparece " . (isset($array_count[$i]) ? $array_count[$i] : 0) ."<br>"; //Cuento las apariciones que contiene cada valor de i en el array, por medio del array count
}
}

function buscar_num_aleatorio($array) {
    $num_aleatorio = random_int(1, 6);
    echo "<h3>Vamos a comprobar si el valor $num_aleatorio aparece en nuestro array</h3>";
    
    $posiciones = array_keys($array, $num_aleatorio); //Esta funcion guarda en la variable posiciones, la posicion en la que encuentra el numero aleatorio en el array
    
    if (!empty($posiciones)) {
        echo "El número $num_aleatorio se encuentra en el array en las siguientes posiciones: ";
        foreach ($posiciones as $posicion) {
            echo "$posicion, ";
        }
    } else {
        echo "El número $num_aleatorio no se encuentra en el array.";
    }
}

function array_ordenado ($array) {
    echo "<h3>Los números del array ordenados son: </h3>";
    rsort($array); //Esta funcion ordena el array de mayor a menor, si le quitasemos la R, la ordena de menor a mayor
    foreach ($array as $elementos){
        echo $elementos.", ";
    }
}

function eliminar_duplicados ($array){
    echo "<h3>El array eliminando los duplicados sería: </h3>";
    $array_sin_duplicados = array_unique($array); //Esta funcion me guarda en otro array, el array original pero eliminando los valores duplicados
    foreach ($array_sin_duplicados as $elementos){
        echo $elementos . ", ";
    }
}
?>