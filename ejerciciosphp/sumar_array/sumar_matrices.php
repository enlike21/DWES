<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Operaciones con matrices</h1>
    
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="operacion">Elige una operación:</label>
        <select name="operacion" id="operacion">
            <option value="suma">Sumar</option>
            <option value="multiplicacion">Multiplicar</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
// Creo dos matrices tridimensionales
$matriz1 = [];
$matriz2 = [];

// Defino las dimensiones de las matrices
$dimension1 = 3;
$dimension2 = 3;
$dimension3 = 3;

// Lleno las matrices con números aleatorios
for ($i = 0; $i < $dimension1; $i++) {
    for ($j = 0; $j < $dimension2; $j++) {
        for ($k = 0; $k < $dimension3; $k++) {
            $matriz1[$i][$j][$k] = rand(1, 100);
            $matriz2[$i][$j][$k] = rand(1, 100);
        }
    }
}

// Imprimir las matrices
echo "Matriz 1:";
print_r($matriz1);
echo "<br><br>";
echo "Matriz 2:";
print_r($matriz2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la operación seleccionada
    $operacion = $_POST["operacion"];
    
    // Realizo la operación seleccionada
    if ($operacion == "suma") {
        // Realizo la suma de las matrices
        $resultado = sumarMatrices($matriz1, $matriz2);
    } elseif ($operacion == "multiplicacion") {
        // Realizo la multiplicación de las matrices
        $resultado = multiplicarMatrices($matriz1, $matriz2);
    }
    
    // Imprimo el resultado
    echo "<h2>Resultado:</h2>";
    echo "<pre>";
        print_r($resultado);
        echo "</pre>";
    }
    
    // Función para sumar dos matrices
    function sumarMatrices($matriz1, $matriz2) {
        $filas = count($matriz1);
        $columnas = count($matriz1[0]);
        $resultado = [];
    
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                $resultado[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
            }
        }
    
        return $resultado;
    }
    
    // Función para multiplicar dos matrices
    function multiplicarMatrices($matriz1, $matriz2) {
        $filas = count($matriz1);
        $columnas = count($matriz1[0]);
        $resultado = [];
    
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                $resultado[$i][$j] = $matriz1[$i][$j] * $matriz2[$i][$j];
            }
        }
    
        return $resultado;
    }
?>
</body>
</html>