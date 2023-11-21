<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="POST">
        <fieldset>
            <legend>Factorial de un número</legend>
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero" required>
        <br>
        <label for="bucle">Seleccione un tipo de bucle:</label>
        <select name="bucle" id="bucle"> <!-- Selecciona un tipo de bucle -->
            <option value="">-Selecciona-</option>
            <option value="for">For</option>
            <option value="while">While</option>
            <option value="do-while">Do-While</option>
            <option value="recursividad">Recursividad</option>
        </select>
        <br>
        <input type="submit" value="Calcular factorial">
        </fieldset>

    <?php

    function factorial_recursivo($n) // Función recursiva para calcular el factorial
    {
        if ($n === 0 || $n === 1) {
            return 1;
        } else {
            return $n * factorial_recursivo($n - 1);
        }
    }

    if (isset($_POST['numero']) && isset($_POST['bucle'])) {
        $numero = $_POST['numero'];
        $bucle = $_POST['bucle'];
        $factorial = 1;

        switch ($bucle) {
            case 'for': //Un bucle for es una estructura de control que se utiliza para repetir un bloque de código un número específico de veces. Se compone de tres partes: la inicialización, la condición y la expresión de incremento/decremento.
                for ($i = 1; $i <= $numero; $i++) {
                    $factorial *= $i;
                }
                break;
            case 'while': // Un bucle while es una estructura de control que se utiliza para repetir un bloque de código mientras se cumpla una condición determinada.
                $i = 1;
                while ($i <= $numero) {
                    $factorial *= $i;
                    $i++;
                }
                break;
            case 'do-while': //Un bucle do-while es una estructura de control que ejecuta un bloque de código al menos una vez y luego repite la ejecución siempre que se cumpla una condición específica. La diferencia principal con otros bucles es que la condición se verifica después de ejecutar el bloque de código
                $i = 1;
                do {
                    $factorial *= $i;
                    $i++;
                } while ($i <= $numero);
                break;
            case 'recursividad': //Una función recursiva es aquella que se llama a sí misma dentro de su propia definición. Se utiliza cuando un problema puede ser dividido en subproblemas más pequeños y similares al problema original. Se repite este proceso hasta alcanzar un caso base, que es un problema lo suficientemente simple que puede ser resuelto directamente sin más llamadas recursivas.
                $factorial = factorial_recursivo($numero);
                break;
            default:
                echo "<p>Seleccione un tipo de bucle válido.</p>";
                break;
        }

        echo "<h5>El factorial de $numero utilizando el bucle $bucle es: $factorial</h5>";
    }
    ?>
    </form>
</body>

</html>