<?php
require_once("cbdd.php");
$baseDatos = new Database();
$db = $baseDatos->getdb();
$stmt_sedes = $db->prepare("SELECT nombre from sedes;");
$stmt_sedes->execute();
$stmt_sedes->bindColumn('nombre', $nombre_sede);

$errornombre = "";
$errordireccion = "";

if (isset($_POST["formSede"])) {
    if (isset($_POST["nombre"]) && isset($_POST["direccion"])) {
        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $tamañonombre = strlen($nombre);
        $tamañodireccion = strlen($direccion);
        $nombrevalido = $tamañonombre >= 3 && $tamañonombre <= 50;
        $direccionvalida = $tamañodireccion >= 10 && $tamañodireccion <= 255;
        if ($nombrevalido && $direccionvalida) {
            $baseDatos = new Database();
            $db = $baseDatos->getdb();
            $stmt = $db->prepare("INSERT INTO SEDES (nombre, direccion) VALUES (?, ?)");
            $stmt->execute([$nombre, $direccion]);
        } else {
            if (!$nombrevalido) {
                $errornombre = "Nombre de sede debe tener entre 3 y 50 caracteres";
            }
            if (!$direccionvalida) {
                $errordireccion = "Dirección debe tener entre 10 y 255 caracteres";
            }
        }
    }
    $baseDatos->__destruct();
    $db = null;
}

if (isset($_POST["formDepartamento"])) {
    if (isset($_POST["nombre"]) && isset($_POST["presupuesto"]) && isset($_POST["sede"])) {
        $departamento_nombre = $_POST["nombre"];
        $presupuesto = $_POST["presupuesto"];
        $tamaño_departamento_nombre = strlen($departamento_nombre);
        $nombre_departamento_valido = $tamaño_departamento_nombre >= 3 && $tamaño_departamento_nombre <= 100;
        $presupuesto_valido = is_numeric($presupuesto) && $presupuesto >= 0;
        $sede_nombre = $_POST["sede"];
        $sede_id_valida = $sede_nombre != "";

        if ($nombre_departamento_valido && $presupuesto_valido && $sede_id_valida) {
            $baseDatos = new Database();
            $db = $baseDatos->getdb();

            // Consulta para verificar si ya existe el nombre del departamento
            $stmt = $db->prepare("SELECT COUNT(*) FROM departamentos WHERE nombre = ?");
            $stmt->execute([$departamento_nombre]);
            $num_rows = $stmt->fetchColumn();

            // Consulta para obtener el ID de la sede basado en su nombre
            $stmt = $db->prepare("SELECT id FROM sedes WHERE nombre = ?");
            $stmt->execute([$sede_nombre]);
            $sede_id = $stmt->fetchColumn();

            if ($num_rows == 0) { // Si no existe el departamento con ese nombre
                $stmt = $db->prepare("INSERT INTO departamentos (nombre, presupuesto, sede_id) VALUES (?, ?, ?)");
                $stmt->execute([$departamento_nombre, $presupuesto, $sede_id]);
            } else {
                $errornombre_departamento = "El nombre del departamento ya existe.";
            }
        } else {
            if (!$nombre_departamento_valido) {
                $errornombre_departamento = "Nombre de departamento debe tener entre 3 y 100 caracteres.";
            }
            if (!$presupuesto_valido) {
                $errorpresupuesto = "El presupuesto debe ser un número mayor o igual a cero.";
            }
            if (!$sede_id_valida) {
                $errorsede = "Sede no válida.";
            }
        }
    }
    $baseDatos->__destruct();
    $db = null;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                    ?>" method="post">
        <p>
            <!-- Campo nombre de la sede -->
            <input type="text" name="nombre" placeholder="Sede">
            <?php if (!empty($errornombre)) {
                echo "<p>$errornombre </p>";
            } ?>
        </p>
        <p>
            <!-- Campo dirección de la sede -->
            <input type="text" name="direccion" placeholder="Dirección">
            <?php if (!empty($errordireccion)) {
                echo "<p> $errordireccion </p>";
            } ?>
        </p>
        <p>
            <!-- Botón submit -->
            <input type="submit" value="Guardar" name="formSede">
        </p>
    </form>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                    ?>" method="post">
        <p>
            <!-- Campo nombre del departamento -->
            <input type="text" name="nombre" placeholder="Departamento">
            <?php if (!empty($errornombre_departamento)) {
                echo "<p>$errornombre_departamento </p>";
            } ?>
        </p>
        <p>
            <!-- Campo presupuesto del departamento -->
            <input type="number" step="0.01" name="presupuesto" placeholder="Presupuesto">
            <?php if (!empty($errorpresupuesto)) {
                echo "<p>$errorpresupuesto</p>";
            } ?>
        </p>
        <p>
            <!-- Campo nombre de la sede -->
            <select id="sede" name="sede">
                <option value="">Seleccione Sede</option>
                <?php
                while ($stmt_sedes->fetch(PDO::FETCH_BOUND)) {
                    echo "<option value='$nombre_sede'>$nombre_sede</option>";
                }
                ?>
                </option>
            </select>
            <?php if (!empty($errordireccion)) {
                echo "<p> $errordireccion </p>";
            } ?>
        </p>
        <p>
            <!-- Botón submit -->
            <input type="submit" value="Guadar" name="formDepartamento">
        </p>
    </form>

</body>

</html>