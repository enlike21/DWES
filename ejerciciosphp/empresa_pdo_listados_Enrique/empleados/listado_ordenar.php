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
    <script type="text/javascript">
        function ordenarListado(campo, orden) {
            location.href = "listado_ordenar.php?orden=" + campo + "&sentido=" + orden;
        }
    </script>
</head>

<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_OBJ)</h1>
    <?php
try{
    // Realiza la conexion a la base de datos a través de una función 
    $baseDatos = new Database();
    $db = $baseDatos->getdb();

    // Realiza la consulta a ejecutar en la base de datos en una variable utiliza las variables $campoOrdenar y $sentidoOrdenar
    $camposOrdenacion = ["nombre", "apellidos", "email", "hijos", "salario", "nacionalidad", "departamento", "sede"];

    if (isset($_GET["orden"])) {
        $campoOrdenar = $_GET["orden"];
    }

    $sentidosOrdenacion = ["ASC", "DESC"];
    if (isset($_GET["sentido"])) {
        $sentidoOrdenar = $_GET["sentido"];
    }

    // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement

    $query = "SELECT nombre, apellidos, email, salario, hijos,
    (SELECT nombre FROM departamentos WHERE id = empleados.departamento_id) AS nombre_departamento, 
    pais_id,
    (SELECT nacionalidad FROM paises WHERE id = empleados.pais_id) AS nacionalidad, 
    (SELECT nombre FROM sedes WHERE id = (SELECT sede_id FROM departamentos WHERE id = empleados.departamento_id)) AS nombre_sede
    FROM empleados";
    $query .= " ORDER BY $campoOrdenar $sentidoOrdenar";

    // Preparar y ejecutar la consulta
    $stmt = $db->prepare($query);
    $stmt->execute();

    // Obtener los resultados
    $empleados = $stmt->fetchAll(PDO::FETCH_OBJ);
}catch (PDOException $e){
    echo "Error ". $e->getMessage();
}
    ?>

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'DESC')">&#8595</a></th>
            <th>Apellidos <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'DESC')">&#8595</a></th>
            <th>Correo electrónico <a href="javascript: void(0);" onclick="ordenarListado('email', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('email', 'DESC')">&#8595</a></th>
            <th>Nº hijos <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'DESC')">&#8595</a></th>
            <th>Salario <a href="javascript: void(0);" onclick="ordenarListado('salario', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('salario', 'DESC')">&#8595</a></th>
            <th>Nacionalidad <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'DESC')">&#8595</a></th>
            <th>Departamento <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'DESC')">&#8595</a></th>
            <th>Sede <a href="javascript: void(0);" onclick="ordenarListado('sede', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('sede', 'DESC')">&#8595</a></th>
        </thead>
        <tbody>

            <!-- Muestra los datos -->
            <?php foreach ($empleados as $empleado) : ?>
                <tr>
                    <td><?php echo $empleado->nombre; ?></td>
                    <td><?php echo $empleado->apellidos; ?></td>
                    <td><?php echo $empleado->email; ?></td>
                    <td><?php echo $empleado->hijos; ?></td>
                    <td><?php echo $empleado->salario; ?></td>
                    <td><?php echo $empleado->nacionalidad; ?></td>
                    <td><?php echo $empleado->nombre_departamento; ?></td>
                    <td><?php echo $empleado->nombre_sede; ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.html">Volver a página de listados</a>
        </div>
    </div>


    <?php

    // Libera el resultado y cierra la conexión
    $stmt=null;
    $baseDatos->__destruct();

    ?>
</body>

</html>