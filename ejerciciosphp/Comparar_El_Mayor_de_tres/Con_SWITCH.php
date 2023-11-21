<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparar el mayor de tres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="POST"> <!-- Formulario --> 
    <fieldset>
        <legend>Introduce 3 números</legend>
    <label for="numero1">Número 1:</label>
    <input type="number" id="numero1" name="numero1" required><br>
    
    <label for="numero2">Número 2:</label>
    <input type="number" id="numero2" name="numero2" required><br>
    
    <label for="numero3">Número 3:</label>
    <input type="number" id="numero3" name="numero3" required><br>
    
    <input class="boton" type="submit" value="Enviar">
    </fieldset>
  </form>
  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $numero3 = $_POST['numero3'];
    
    switch (true) { //Hago un switch para comprobar si el número 1 es mayor que el número 2 y que el numero 3
        case ($numero1 > $numero2 && $numero1 > $numero3):
            $mayor = $numero1;
            echo "<h3>El mayor de los tres es: $mayor</h3>";
            break;
        case ($numero2 > $numero1 && $numero2 > $numero3): //Compruebo que el número 2 sea mayor que el número 1 y el 3
            $mayor = $numero2;
            echo "<h3>El mayor de los tres es: $mayor</h3>";
            break;
        case ($numero3 > $numero1 && $numero3 > $numero2): //Compruebo que el número 3 sea mayor que el número 1 y el 2
            $mayor = $numero3;
            echo "<h3>El mayor de los tres es: $mayor</h3>";
            break;
        default: //Si no se cumple ninguna de las condiciones anteriores, no se determina el mayor
            $mayor = "No se puede determinar el mayor";
            break;
    }
}

?>

</body>
</html>