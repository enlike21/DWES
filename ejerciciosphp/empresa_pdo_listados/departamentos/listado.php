<?php

// Incluye ficheros de variables y funciones
require_once("../cbdd.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de departamentos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_BOUND)</h1>

    <?php
    // Realiza la conexion a la base de datos a través de una función 
    $baseDatos = new Database();
    $db = $baseDatos->getdb();

    // Prepara la consulta SQL para obtener los datos de los departamentos
    $query = $db->prepare("SELECT nombre, presupuesto, (select nombre from sedes where id = departamentos.sede_id) as nombre_sede from departamentos");

    // Ejecuta la consulta
    $query->execute();

    // Vincula los resultados de la consulta a variables específicas
    $query->bindColumn('nombre', $nombre);
    $query->bindColumn('presupuesto', $presupuesto);
    $query->bindColumn('nombre_sede', $id_sede);


    ?>
    <table border="1" cellpadding="10">
        <thead>
            <th>Departamento</th>
            <th>Presupuesto</th>
            <th>Sede</th>
        </thead>
        <tbody>

            <!-- Muestra los datos -->
            <?php
            while ($query->fetch(PDO::FETCH_BOUND)) {
                echo "<tr>
                <td>$nombre</td>
                <td>$presupuesto</td>
                <td>$id_sede</td>
              </tr>";
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
    $db=null;
    $baseDatos->__destruct();
    // Libera el resultado y cierra la conexión

    ?>
</body>

</html>