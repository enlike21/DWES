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
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

</head>

<body>
    <h1>Listado de empleados usando fetch (PDO::FETCH_OBJ)</h1>
    <?php

    // Realiza la conexion a la base de datos a través de una función 
    $baseDatos = new Database();
    $db = $baseDatos->getdb();

    // Realiza la consulta a ejecutar en la base de datos en una variable
    $query = $db->prepare("SELECT nombre, apellidos, email, salario, hijos,
    (SELECT nombre FROM departamentos WHERE id = empleados.departamento_id) AS nombre_departamento, 
    pais_id,
    (SELECT nacionalidad FROM paises WHERE id = empleados.pais_id) AS nacionalidad, 
    (SELECT nombre FROM sedes WHERE id = (SELECT sede_id FROM departamentos WHERE id = empleados.departamento_id)) AS nombre_sede
    FROM empleados");




    // Ejecuta la consulta
    $query->execute();

    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El 
    $empleados = $query -> fetchAll(PDO::FETCH_OBJ);
    ?>

    <table border="1" cellpadding="10" style="margin-bottom: 10px;">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo electrónico</th>
            <th>Nº hijos</th>
            <th>Salario</th>
            <th>Nacionalidad</th>
            <th>Departamento</th>
            <th>Sede</th>
        </thead>
        <tbody>

            <!-- Mostrar todos los datos de los empleados -->
            <?php
            foreach ($empleados as $empleado) {
        echo "<tr>
                <td>{$empleado->nombre}</td>
                <td>{$empleado->apellidos}</td>
                <td>{$empleado->email}</td>
                <td>{$empleado->hijos}</td>
                <td>{$empleado->salario}</td>
                <td>{$empleado->nacionalidad}</td>
                <td>{$empleado->nombre_departamento}</td>
                <td>{$empleado->nombre_sede}</td>
              </tr>";
    }
?>
        </tbody>
    </table>

    <div class="contenedor">
        <div class="enlaces">
            <p><a href="listado_ordenar.php">Ordenar los datos segun su categoria</a></p>
            <p><a href="listado_filtrar.php">Ordenar los datos filtrando datos</a></p>
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