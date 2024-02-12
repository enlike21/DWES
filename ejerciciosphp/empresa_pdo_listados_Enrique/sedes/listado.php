<?php
require_once("../cbdd.php");
// Incluye ficheros de variables y funciones

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de sedes</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de sedes usando fetch (PDO::FETCH_ASSOC)</h1>

    <?php
    try {
    // Realiza la conexion a la base de datos a través de una función 
    $baseDatos = new Database();
    $db = $baseDatos->getdb();
        // Realiza la consulta a ejecutar en la base de datos en una variable
        $query = $db->query("SELECT nombre,direccion FROM sedes");

        // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement
        if ($query instanceof PDOStatement) {
            $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
    ?>

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre</th>
            <th>Dirección</th>
        </thead>
        <tbody>
            <?php
            if (isset($resultados) && !empty($resultados)) {
                foreach ($resultados as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['direccion'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.html">Volver a página de listados</a>
        </div>
    </div>

    <?php

    // Libera el resultado y cierra la conexión
    $resultados=null;
    $baseDatos->__destruct();

    ?>
</body>

</html>