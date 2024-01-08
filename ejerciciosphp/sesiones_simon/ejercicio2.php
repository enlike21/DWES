<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $num_decolores = random_int(2, 7);
        $arraycolores = ["red", "green", "blue", "yellow"];
        
        echo "<h1>Secuencia a reproducir:</h1>";

        for ($i = 0; $i < $num_decolores; $i++) {
            // Use array_rand to get a random key and then access the color value
            $random_color_key = array_rand($arraycolores);
            $random_color = $arraycolores[$random_color_key];
            
            echo '<div style="background-color:' . $random_color . '; width: 100px; height: 100px; display: inline-block; margin: 5px;"></div>';
        }
    ?>
</body>
</html>
