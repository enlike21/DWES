<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Realizar un programa que modifique el color de una tabla, mediante las preferencias en una cookie.
Tendrá tres botones que establecerán colores diferentes. esa cookie tendrá una duración de 10 segundos. -->
<table border="1px">
    <tr>
        <td>a</td>
        <td>a</td>
        <td>a</td>
    </tr>
    <tr>
        <td>a</td>
        <td>a</td>
        <td>a</td>
    </tr>
    <tr>
        <td>a</td>
        <td>a</td>
        <td>a</td>
    </tr>
</table>
<form method="POST">
    <button type="submit" value="red" name="colores">Rojo</button>
    <button type="submit" value="green" name="colores">Verde</button>
    <button type="submit" value="blue" name="colores">Azul</button>
</form>
<?php
    $color = "";
    if (isset($_POST['colores'])) {
        $color = $_POST['colores'];
        setcookie('colores', $color, time()+5);
    } else if (isset($_COOKIE["colores"])) {
        $color = $_COOKIE["colores"];
    }
?>
<style>
    tr, td {
        background-color: <?php echo $color ?>;
    }
</style>
</body>
</html>