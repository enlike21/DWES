<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="CalculadoraCSS.css">
</head>

<!--a) Implementar una calculadora que realice las operaciones de sumar, restar, multiplicar y dividir.

b) Realizar la implementación anterior teniendo en cuenta  que el nombre de la función es calculadora y tiene 3 argumentos: 

.nombre de la función que realiza el cálculo
.valor de entrada 1
.valor de entrada 2. -->

<body>
    <form method="post" action=""> <!-- Formulario -->
        <fieldset>
            <legend>CALCULADORA</legend>
            <label for="numero1">Numero 1:</label>
            <input type="number" id="numero1" name="numero1" placeholder="Numero 1" required>
            <label for="numero2">Numero 2:</label>
            <input type="number" id="numero2" name="numero2" placeholder="Numero 2" required>
            <label for="operador">Operador:</label>
            <select id="operador" name="operador" required>
                <option value="">Elige un operador</option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="x">x</option>
                <option value="/">/</option>
            </select>
            <div class="botones">
                <input type="submit" value="Calcular" id="calcular">
                <input type="reset" value="Limpiar" id="limpiar">
            </div>
        </fieldset>
        
        <!-- FUNCIÓN CALCULADORA EN PHP PARA EL RESULTADO-->
        <?php
        function calcularResultado()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($_POST['operador'] == '/' && ($_POST['numero2'] == 0 || $_POST['numero1'] == 0)) { //Compruebo si se está intentando dividir entre cero y si se está intentando dividir entre cero, lanzamos un error.
                    echo "<p>No es posible dividir entre 0</p>";
                } else {
                    $numero1 = $_POST['numero1'];
                    $numero2 = $_POST['numero2'];
                    $operador = $_POST['operador'];
                    switch ($operador) { //Hacemos un switch para comprobar si el operador es igual a +, -, x o / y hacemos la operación correspondiente.
                        case '+':
                            $resultado = $numero1 + $numero2;
                            echo "<p>El resultado de la suma es: " . $resultado . "</p>";
                            break;
                        case '-':
                            $resultado = $numero1 - $numero2;
                            echo "<p>El resultado de la resta es: " . $resultado . "</p>";
                            break;
                        case 'x':
                            $resultado = $numero1 * $numero2;
                            echo "<p>El resultado de la multiplicacion es: " . $resultado . "</p>";
                            break;
                        case '/':
                            $resultado = $numero1 / $numero2;
                            echo "<p>El resultado de la division es: " . $resultado . "</p>";
                            break;
                        default:
                            echo "<p>Operador no válido</p>";
                            break;
                    }
                }
            }
        }
        calcularResultado(); // Ejecutamos la función calcularResultado()
        ?>
    </form>
</body>

</html>