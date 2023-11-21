<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>EJERCICIO 2</h2>

<?php
$a = 22;
$b = $a;
 //Con la \ antes de la variable, podemos nombrarla en una cadena sin llamar a la variable
echo "La variable \$a vale: " . $a;
echo "<br>La variable \$b vale: " . $b;

unset($b); //Elimino la variable \$b;
echo "<h3>Elimino la referencia de \$a</h3>";
if (isset($b)) {
    echo "La variable \$a vale: " . $a;
    echo "\$b tiene un valor de: " . $b;
} elseif (!isset($b)) { //Al poner isset, se comprueba si $b está definido, si ponemos la exclamación, se comprueba si $b no está definido.
    echo "La variable \$a vale: " . $a;
    echo "<br>La variable \$b no tiene valor";
}

?>
</body>
</html>