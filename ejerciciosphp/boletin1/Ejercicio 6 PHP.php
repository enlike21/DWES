<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
<!-- 6.- Realiza un ejercicio que asigne los siguientes valores a variables $a1 a $a10 y después te muestre la variable y el tipo, usando gettype($var).

347

2147483647

-2147483647

23.7678

3.1416

"347" 

“3.1416" 

"Solo literal" 

"12.3 Literal con número" -->

<h1>Ejercicio 6</h1>
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