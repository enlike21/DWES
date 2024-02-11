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
    <h1>Listado de departamentos usando fetch (PDO::FETCH_ASSOC)</h1>
    <?php

    // Realiza la conexion a la base de datos a través de una función 
    $baseDatos = new Database();
    $db = $baseDatos->getdb();

    // Realiza la consulta a ejecutar en la base de datos en una variable
    $query = $db->prepare("SELECT nombre, apellidos, email, salario, hijos, departamento_id  from empleados");

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
                <td>{$empleado->salario}</td>
                <td>{$empleado->hijos}</td>
                <td>{$empleado->departamento_id}</td>
                <td>{$empleado->nombre_sede}</td>
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

    // Libera el resultado y cierra la conexión

    ?>
</body>

</html>