<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default</title>
</head>
<body>
<form method="post">
    <input type="text" name="texto" placeholder="escribe un nombre">
    <button type="submit" name="leer" value="leer">Leer</button>
    <button type="submit" name="guardar" value="guardar">Guardar</button>
</form>

<?php

session_start();
if(!isset($_SESSION['patata'])) {
    session_start();
    $personas=[];
    $_SESSION['patata'] = $personas;
    }
    else {
        if(isset($_POST['guardar'])) {
            $texto=$_POST['texto'];
            $_SESSION['patata'][] = $texto;
        }
        else if (isset($_POST['leer'])) {
            echo "<ul>";
            foreach ($_SESSION['patata'] as $nombre){
                echo "<li>$nombre</li>";
            }
            echo "</ul>";
        }
    }
?>

</body>
</html>