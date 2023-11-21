<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <!--7.- Escribe otro ejercicio que le asigne una serie de valores a las siguientes variables y muestre el nombre de la variable, el valor y el tipo de datos al que pertenece.
    A continuación se le deberá forzar el tipo a lo que se indique, y mostrar el tipo nuevo al que pertenece, el nombre de la variable y su valor. Usar las funciones settype y gettype. -->

    <h1>Ejercicio 7</h1>
<?php
$a="";
$array=array(347,2147483647,-2147483647,23.7678,3.1416,"347","3.1416","Solo literal","12.3 Literal con número");
echo "<table>";
echo "<tr>";
echo "<th>Variable</th>";
echo "<th>Tipo de dato</th>";
echo "<th>Valor</th>";
echo "</tr>";
for($i=0;$i<count($array);$i++){
 ${"a".$i}=$array[$i];
        echo "<tr>";
        echo "<td>" . "\$a".$i. "</td>";
        echo "<td>" .  gettype(${"a".$i}). "</td>";
        echo "<td>" . ${"a".$i}=$array[$i] . "</td>";
        echo "</tr>";
}
echo "</table>";
?>

</body>

</html>