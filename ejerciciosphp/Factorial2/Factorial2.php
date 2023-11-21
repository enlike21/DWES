<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pirámide Invertida</h1>
    <form method="post" action="">
        <label for="filas">Filas:</label>
        <input type="number" name="filas" id="filas" min="1">
    </form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $altura = $_POST['filas'];

// Lado izquierdo de la pirámide
for ($i = $altura; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}
}

?>
</body>
</html>