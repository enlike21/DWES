<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Colores Seleccionados</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estiloejercicio1.css">
</head>

<body>
  <h2>Colores Seleccionados:</h2>
    <?php

    if (isset($_SESSION["colores"])) {
        foreach ($_SESSION["colores"] as $color) {
            echo '<div style="background-color:' . $color . '; width: 50px; height: 50px; display: inline-block; margin: 5px;"></div>';
        }
    } else {
        echo "Ningún color seleccionado.";
    }
    ?>
  
  <p><a href="ejercicio1.php">Volver a seleccionar colores</a></p>
</body>
</html>
