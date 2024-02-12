<?php

try {
    $mysql = "mysql:host=localhost;dbname=empleadosempresa;charset=UTF8";
    $usuario = "Enrique";
    $password = "quique123";

    $conexion = new PDO($mysql, $usuario, $password);
    echo "Base de datos conectada<br>";
    /* ASI TE CONECTAS A LA BDD 😊*/

    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo $version;
} catch (PDOException $e) {
    //Se muestra el error
    echo "<p>" . $e->getMessage() . "</p>";
}
