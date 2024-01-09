<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["eleccion"])) {
        $_SESSION["colores"][] = $_POST["eleccion"];
        header("Location: colores_seleccionados.php");
        exit();
    } elseif (isset($_POST["reiniciar"])) {
        // Reinicio la lista de colores en la sesión
        $_SESSION["colores"] = [];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>HTML - Color botón</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estiloejercicio1.css">
</head>

<body>
  <form method="post">
    <div class="divcolores">
        <button type="submit" name="eleccion" value="red" id="red"></button>
        <button type="submit" name="eleccion" value="blue" id="blue"></button>
        <button type="submit" name="eleccion" value="green" id="green"></button>
        <button type="submit" name="eleccion" value="yellow" id="yellow"></button>
        <br>
        <button type="submit" name="reiniciar" value="reiniciar">Reiniciar</button>
    </div>
</form>
</body>
</html>
