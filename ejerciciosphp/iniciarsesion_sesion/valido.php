<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["nombre"]; ?></h1>
<form method="post">
    <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
</form>

<?php
if (isset($_POST['cerrar_sesion']) ){
    session_unset();
    session_destroy();
    header('Location: iniciarsesionsesion.php');
    exit();
}

?>

</body>
</html>