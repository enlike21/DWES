<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php $informacion = isset($_COOKIE['informacion']) ? unserialize($_COOKIE['informacion']) : array();?>
<h1>Bienvenido, <?php echo $informacion[0] ?></h1>
<form method="post" action="iniciarsesioncookies.php">
    <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
</form>

<?php

if (isset($_POST['cerrar_sesion']) ){
    setcookie('informacion', '');
    header('Location: iniciarsesioncookies.php');
    exit();
}

?>

</body>
</html>