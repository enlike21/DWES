<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Colores</title>
    <link rel="stylesheet" href="estiloejercicio2.css">
    <style>
        .color-box {
            width: 100px;
            height: 100px;
            margin: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php
        session_start();

        $num_decolores = random_int(2, 7);
        $arraycolores = ["red", "green", "blue", "yellow"];

        if (!isset($_SESSION["secuencia"])) {
            $_SESSION["secuencia"] = [];
            for ($i = 0; $i < $num_decolores; $i++) {
                $random_color_key = array_rand($arraycolores);
                $random_color = $arraycolores[$random_color_key];
                $_SESSION["secuencia"][] = $random_color;
                echo '<div class="color-box" style="background-color:' . $random_color . ';"></div>';
            }
        }
    ?>

    <form method="post">
        <div class="divcolores">
            <button type="submit" name="eleccion" value="red" class="color-box" id="red"></button>
            <button type="submit" name="eleccion" value="blue" class="color-box" id="blue"></button>
            <br>
            <button type="submit" name="eleccion" value="green" class="color-box" id="green"></button>
            <button type="submit" name="eleccion" value="yellow" class="color-box" id="yellow"></button>
            <button type="submit" name="reiniciar" value="reiniciar">Reiniciar</button>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["eleccion"])) {
            $eleccion = $_POST["eleccion"];
            $_SESSION["jugador_secuencia"][] = $eleccion;

            $i = count($_SESSION["jugador_secuencia"]) - 1;
            echo '<div class="color-box" style="background-color:' . $eleccion . ';"></div>';

            // Verificar si la elección es correcta
            if ($_SESSION["jugador_secuencia"][$i] !== $_SESSION["secuencia"][$i]) {
                echo '<h2>Fin del juego. Intenta de nuevo.</h2>';
                session_unset();  // Limpiar las variables de sesión
            } elseif ($i == $num_decolores - 1) {
                echo '<h2>¡Enhorabuena! Has completado la secuencia correctamente.</h2>';
                session_unset();  // Limpiar las variables de sesión
            }
        } elseif (isset($_POST["reiniciar"])) {
            session_unset();  // Reiniciar el juego
            header("Location: " . $_SERVER["PHP_SELF"]);
        }
    }
    ?>
</body>
</html>
