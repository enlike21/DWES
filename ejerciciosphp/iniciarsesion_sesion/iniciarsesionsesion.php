<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>
<body>
    <form method="post">
            <h3>Iniciar Sesión</h3>
            <label>Usuario:</label>
            <input type="text" name="nombre_usuario">
            <label>Contraseña:</label>
            <input type="password" name="contraseña">
            <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
        </fieldset>
    </form>

    <?php
        session_start();
    if (isset($_POST['iniciar_sesion'])) {
        $nombre = $_POST['nombre_usuario'];
        $pass = $_POST['contraseña'];
        $_SESSION['nombre'] = $nombre;
        header('Location: valido.php');
        exit();
    }
    ?>
</body>
</html>
