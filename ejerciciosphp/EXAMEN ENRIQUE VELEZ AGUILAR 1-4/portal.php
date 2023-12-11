<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php //INICIO LA SESION
        session_start();
    ?>
    <h1>Portal de usuario</h1> <!--MUESTRO EL VALOR DEL ARRAY SERVIDOR EN PANTALLA-->
    <p>Hola, tu clave es <?php echo $_SESSION["usuario"]["password"];?></p>

    <form method="post">
        <input type="submit" name="leer" value="Leer usuarios">
        <input type="submit" name="cerrar" value="Cerrar sesión">
    </form>
    
    <?php
    //SI LE HA DADO A LEER, CREO UNA TABLA Y HAGO UN FOREACH CON EL ARRAY OBTENDO DEL EXPLODE. PARA QUE SE SEPAREN LOS VALORES
    if (isset($_POST["leer"])){
        $fichero=fopen('./usuarios.txt','r');
        $contenido=file_get_contents('./usuarios.txt');
        $separado=explode(",",$contenido);
?>
        <table border="1">
            <tr>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Contraseña</th>
            </tr>
            <tr>
                <?php
            foreach( $separado as $linea){
                echo "<td> $linea </td>";
            }?>
            </tr>
        </table>
        <?php
        }

        //SISE HA DADO AL BOTON CERRAR, CIERRO LA SESION Y VUELVO A LA OTRA PAGINA
    else if(isset($_POST["cerrar"])){
        unset($_SESSION["usuario"]);
        session_destroy();
        header("Location: login.php");
        exit();
    }


    ?>
</body>
</html>