<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if (isset($_COOKIE['miagenda'])) {
    $nombres = unserialize($_COOKIE['miagenda']);
} else {
    $nombres=[];
}

if(isset($_POST['guardar'])) {
    $texto=$_POST['texto'];
    $nombres[]=$texto;
    setcookie('miagenda', serialize($nombres), time() + 360000);
}

if (isset($_POST['leer'])) {
    echo "<ol>";
    foreach ($nombres as $nombre){
        echo "<li>$nombre</li>";
    }
    echo "</ol>";
}


?>

<form method="post">
    <input type="text" name="texto" placeholder="escribe un nombre">
    <button type="submit" name="leer" value="leer">Leer</button>
    <button type="submit" name="guardar" value="guardar">Guardar</button>
</form>

</body>
</html>