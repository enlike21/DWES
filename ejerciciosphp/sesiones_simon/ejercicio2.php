<?php
session_start();

$coloresPosibles = ['red', 'blue', 'green', 'yellow'];
$eleccion = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eleccion = $_POST['eleccion'];
    $_SESSION['elecciones'][] = $eleccion;
    if ($_SESSION['elecciones'] == $_SESSION['coloresGenerados']) {
        echo "<p>Correcto! Has ganado la partida.</p>";
        unset($_SESSION['coloresGenerados']);
        unset($_SESSION['elecciones']);
    } else {
        if ($eleccion != $_SESSION['coloresGenerados'][count($_SESSION['elecciones']) - 1]) {
            echo "<p>Incorrecto! Has perdido la partida.</p>";
            unset($_SESSION['coloresGenerados']);
            unset($_SESSION['elecciones']);
        }
    }
}

if (empty($_SESSION['coloresGenerados'])) {
    $_SESSION['coloresGenerados'] = [];
    for ($i = 0; $i < rand(2, 7); $i++) {
        $color = $coloresPosibles[array_rand($coloresPosibles)];
        $_SESSION['coloresGenerados'][] = $color;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Colores</title>
    <link rel="stylesheet" href="estiloejercicio2.css">
</head>

<body>
    <form method="post">
        <div class="divcolores">
            <?php
            foreach ($_SESSION['coloresGenerados'] as $color) {
                echo "<div style='background-color: $color; width: 100px; height: 100px; display: inline-block;'></div>";
            }
            ?>

            <br>

            <button type="submit" name="eleccion" value="red" style="background-color: red; width: 100px; height: 100px; display: inline-block;"></button>
            <button type="submit" name="eleccion" value="blue" style="background-color: blue; width: 100px; height: 100px; display: inline-block;"></button>
            <button type="submit" name="eleccion" value="green" style="background-color: green; width: 100px; height: 100px; display: inline-block;"></button>
            <button type="submit" name="eleccion" value="yellow" style="background-color: yellow; width: 100px; height: 100px; display: inline-block;"></button>

            <br>

            <button type="submit" name="reiniciar" value="reiniciar">Reiniciar</button>
        </div>
    </form>
</body>

</html>