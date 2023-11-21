<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: khaki;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        form{
            background-color: cornflowerblue;
            border: solid 1px #ccc;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
            padding: 1rem;
            font-size: xx-large;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
<form method="POST" action="">
  <label for="numero">Introduce un número:</label>
  <input type="number" name="numero" id="numero" required>
  <button type="submit">Guardar</button>
</form>
<form method="POST" action="">
  <label for="buscar">Buscar número:</label>
  <input type="number" name="buscar" id="buscar" required>
  <button type="submit">Buscar</button>
</form>
<form method="POST" action="">
  <button type="submit" name="limpiar">Limpiar Array</button>
</form>
<?php
session_start(); // Iniciar la sesión (si no lo has hecho ya)
// Verificar si se ha enviado un número a través del formulario
if(isset($_POST['numero'])) {
  // Obtener el número enviado desde el formulario
  $numero = $_POST['numero'];
  // Verificar si el array ya existe en la sesión
  if(isset($_SESSION['numeros'])) {
    // Si el array ya existe, agregar el número a la sesión
    array_push($_SESSION['numeros'], $numero);
  } else {
    // Si el array no existe, crear uno nuevo y agregar el número
    $_SESSION['numeros'] = array($numero);
  }
  // Imprimir el contenido del array
  print_r($_SESSION['numeros']);
}
elseif(isset($_POST['buscar'])) {
  // Obtener el número a buscar
  $buscar = $_POST['buscar'];
  // Verificar si el array ya existe en la sesión
  if(isset($_SESSION['numeros'])) {
    // Buscar el número en el array
    if(in_array($buscar, $_SESSION['numeros'])) {
      echo "El número " . $buscar . " se encuentra en el array.";
      // Mostrar confirmación para obtener la posición
      echo "<script>";
      echo "var confirmacion = confirm('¿Quieres saber la posición?');";
      echo "if(confirmacion) {";
      echo "var posicion = " . array_search($buscar, $_SESSION['numeros']) . ";";
      echo "alert('La posición del número es: ' + posicion);";
      echo "}";
      echo "</script>";
    } else {
      echo "El número " . $buscar . " no se encuentra en el array.";
    }
  } else {
    echo "El array está vacío.";
  }
}
if (isset($_POST['limpiar'])) {
    // Limpiar el array en la sesión
    $_SESSION['numeros'] = array();
    // Mostrar un mensaje de confirmación en español
    echo "El array ha sido limpiado.";
}
?>
</body>
</html>