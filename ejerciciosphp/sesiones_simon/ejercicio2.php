<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ejercicio1.css">
</head>
<body>
    <?php

        $num_decolores = random_int(2, 7);
        $arraycolores = ["red", "green", "blue", "yellow"];
        
        echo "<h1>Secuencia a reproducir:</h1>";

        for ($i = 0; $i < $num_decolores; $i++) {
            $random_color_key = array_rand($arraycolores);
            $random_color = $arraycolores[$random_color_key];
            
            echo '<div style="background-color:' . $random_color . '; width: 100px; height: 100px; display: inline-block; margin: 5px;"></div>';
        }
    ?>
    <form method="post">
        <div class="divcolores">
            <button type="submit" name="eleccion" value="red" id="red"></button>
            <button type="submit" name="eleccion" value="blue" id="blue"></button>
            <button type="submit" name="eleccion" value="green" id="green"></button>
            <button type="submit" name="eleccion" value="yellow" id="yellow"></button>
            <button type="submit" name="reiniciar" value="reiniciar">Reiniciar</button>
        </div>
    </form>

    <?php
    $elecciones=array();
    $i=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["eleccion"])) {
            $elecciones[$i]=$_POST["eleccion"];
            $i++;
        } elseif (isset($_POST["reiniciar"])) {
            // Reinicio la lista de colores
           $elecciones=[];
        }
    }
    foreach ($elecciones as $eleccion) {
        echo '<div style="background-color:' . $random_color . '; width: 100px; height: 100px; display: inline-block; margin: 5px;"></div>';
    }
    ?>
</body>
</html>
