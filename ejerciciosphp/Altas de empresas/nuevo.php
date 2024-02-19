<?php
require_once("cbdd.php");
$baseDatos = new Database();
$db = $baseDatos->getdb();
$stmt = $db->prepare("SELECT nombre from sedes;");
$stmt->execute();
$stmt->bindColumn('nombre', $nombre);

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
}

if (isset($_POST["formDepartamento"])) {
    if (isset($_POST["nombre"]) && isset($_POST["presupuesto"]) && isset($_POST["sede"])) {
        $departamento_nombre = $_POST["nombre"];
        $presupuesto = $_POST["presupuesto"];
        $tamaño_departamento_nombre = strlen($departamento_nombre);
        $nombre_departamento_valido = $tamaño_departamento_nombre >= 3 && $tamaño_departamento_nombre <= 100;
        $presupuesto_valido = is_int($presupuesto);
        if ($nombre_departamento_valido && $presupuesto_valido) {
            $baseDatos = new Database();
            $db = $baseDatos->getdb();
            
        } else {
            if (!$nombrevalido) {
                $errornombre = "Nombre de sede debe tener entre 3 y 50 caracteres";
            }
            if (!$direccionvalida) {
                $errordireccion = "Dirección debe tener entre 10 y 255 caracteres";
            }
        }
    }
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
        </p>
        <p>
            <!-- Campo presupuesto del departamento -->
            <input type="number" step="0.01" name="presupuesto" placeholder="Presupuesto">
        </p>
        <p>
            <!-- Campo nombre de la sede -->
            <select id="sede" name="sede">
                <option value="">Seleccione Sede</option>
                <?php
                while ($stmt->fetch(PDO::FETCH_BOUND)) {
                    echo "<option value='$nombre'>$nombre</option>";}?>
              </option>
            </select>
        </p>
        <p>
            <!-- Botón submit -->
            <input type="submit" value="Guadar" name="formDepartamento">
        </p>
    </form>

</body>

</html>