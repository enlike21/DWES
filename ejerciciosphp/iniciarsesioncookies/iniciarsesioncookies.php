<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>
<body>
    <form method="post" action="iniciarsesioncookies2.php" onsubmit="return comprobacion()">
        <fieldset>
            <h3>Iniciar Sesión</h3>
            <label>Usuario:</label>
            <input type="text" name="nombre_usuario">
            <label>Contraseña:</label>
            <input type="password" name="contraseña">
            <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
        </fieldset>
    </form>

    <?php
    if (isset($_POST['iniciar_sesion'])) {
        $informacion[0] = $_POST['nombre_usuario'];
        $informacion[1] = $_POST['contraseña'];
        setcookie('informacion', serialize($informacion));
        header('Location: iniciarsesioncookies2.php');
        exit();
    }
    ?>
    
    <script>
        function comprobacion() {
            var nombre = document.getElementsByName("nombre_usuario")[0].value;
            var contraseña = document.getElementsByName("contraseña")[0].value;
            var informacion = '<?php echo isset($_COOKIE['informacion']) ? unserialize($_COOKIE['informacion']) : ''; ?>';

            if (informacion && nombre === informacion[0] && contraseña === informacion[1]) {
                alert("Todo correcto");
                return true;
            } else {
                alert("La contraseña o el usuario no coinciden");
                return false;
            }
        }
    </script>
</body>
</html>
