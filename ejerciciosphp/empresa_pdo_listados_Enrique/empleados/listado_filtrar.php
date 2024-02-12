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
  <h1>Listado de empleados (filtrar por salario y/o número de hijos)</h1>
  <div style="margin-bottom: 1em">
    <fieldset style="width:50%">
      <legend>Filtrado</legend>
      <form name="filtrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p><label for="texto">Texto <input type="text" name="texto"></label>
        </p>
        <p><label for="salarioMinimo">Salario mínimo <input type="number" step="0.01" name="salarioMinimo" min="0"></label>
          <label for="salarioMaximo">Salario Máximo <input type="number" step="0.01" name="salarioMaximo" min="0"></label>
        </p>
        <p>Hijos: <select name="hijos">
            <option value="">Seleccione el número de hijos</option>
            <?php
            for ($i = 0; $i <= 10; $i++) :
            ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            endfor;
            ?>
          </select>
        </p>
        <input type="submit" value="Filtrar">
      </form>
    </fieldset>
  </div>
  <?php

require_once("../cbdd.php");

$baseDatos = new Database();
$db = $baseDatos->getdb();

$texto = isset($_POST['texto']) ? $_POST['texto'] : '';
$salarioMinimo = isset($_POST['salarioMinimo']) ? $_POST['salarioMinimo'] : null;
$salarioMaximo = isset($_POST['salarioMaximo']) ? $_POST['salarioMaximo'] : null;
$hijos = isset($_POST['hijos']) ? $_POST['hijos'] : '';

$condiciones = [];

if (!empty($texto)) {
    $condiciones[] = "(nombre LIKE '%$texto%' OR apellidos LIKE '%$texto%' OR email LIKE '%$texto%')";
}
if (!is_null($salarioMinimo) && is_numeric($salarioMinimo)) {
    $condiciones[] = "salario >= $salarioMinimo";
}
if (!is_null($salarioMaximo) && is_numeric($salarioMaximo)) {
    $condiciones[] = "salario <= $salarioMaximo";
}
if (!empty($hijos)) {
    $condiciones[] = "hijos = $hijos";
}

$query = "SELECT nombre, apellidos, email, salario, hijos,
            (SELECT nombre FROM departamentos WHERE id = empleados.departamento_id) AS nombre_departamento, 
            pais_id,
            (SELECT nacionalidad FROM paises WHERE id = empleados.pais_id) AS nacionalidad, 
            (SELECT nombre FROM sedes WHERE id = (SELECT sede_id FROM departamentos WHERE id = empleados.departamento_id)) AS nombre_sede
            FROM empleados";
if (!empty($condiciones)) {
    $query .= " WHERE " . implode(" AND ", $condiciones);
}

$stmt = $db->query($query);
$empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

  <table border="1" cellpadding="10">
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
      <!-- Muestra los datos -->
      <?php
      foreach ($empleados as $empleado) {
        echo "<tr>
                <td>{$empleado['nombre']}</td>
                <td>{$empleado['apellidos']}</td>
                <td>{$empleado['email']}</td>
                <td>{$empleado['hijos']}</td>
                <td>{$empleado['salario']}</td>
                <td>{$empleado['nacionalidad']}</td>
                <td>{$empleado['nombre_departamento']}</td>
                <td>{$empleado['nombre_sede']}</td>
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
  $baseDatos->__destruct();
  $db=null;
  // Libera el resultado y cierra la conexión

  ?>
</body>

</html>