<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Escribe un programa php que realice las siguientes acciones:

Realizar un programa que muestre los archivos que contiene "C:"
Cambia a la carpeta c:/
Crea un directorio "pruebas".
Entra en él.
Lista solo los archivos que contengan una "2" en el nombre. 
Si no hay ninguno, en php:
Crea un nuevo fichero
Introduce texto "este fichero contiene un 2 en el nombre".
Cierra el fichero.
Lista el fichero usando el filtro "contiene un 2 en el nombre".
Lista solo los archivos que empiecen por a y terminen por z.
Crea un fichero en el directorio para comprobarlo (puedes hacerlo desde el sistema operativo).
Lista solo los archivos que contengan números.
Crea un fichero en el directorio para comprobarlo (puedes hacerlo desde el sistema operativo).
Lista solo los archivos de formato pdf.
Crea un fichero en el directorio para comprobarlo (puedes hacerlo desde el sistema operativo).
Desde php, lee un fichero de pruebas que hayas creado y muestralo por pantalla.-->

<?php
$folder = 'C:';

// Compruebo si la carpeta existe
if (is_dir($folder)) {
    chdir($folder);
    // Creo el directorio "pruebas"
    if (!is_dir("pruebas")) {
        mkdir("pruebas");
    }
    // Cambio al directorio "pruebas"
    chdir("pruebas");
    // Creo un archivo llamado "Numero2" que cumpla con la condición
    $numero2 = fopen("Numero2.txt", "w");
    fwrite($numero2, "Archivo contiene el número 2 en el nombre");
    fclose($numero2);
    // Creo un archivo llamado "apaz" que cumpla con la condición
    $ayz = fopen("apaz.txt", "w");
    fwrite($ayz, "Archivo que empieza con 'a' y termina con 'z'");
    fclose($ayz);
    // Creo un archivo con números
    $numero = rand(1, 9);
    $nombreArchivo = $numero . ".txt";
    $archivo = fopen($nombreArchivo, "w");
    fwrite($archivo, "Archivo con número: " . $numero);
    fclose($archivo);
    // Creo un archivo PDF
    $pdf = fopen("patata.pdf", "w");
    fwrite($pdf, "Contenido del archivo PDF");
    fclose($pdf);
    // Obtengo la lista de archivos en el directorio
    $archivos = scandir(".");
    // Patrones a verificar
    $patrones = array(
        ".*2.*", // Archivos que contengan un "2"
        "^a.*z.txt$", // Archivos que empiecen con 'a' y terminen con 'z'
        ".*[0-9].*", // Archivos que contengan números
        ".*\.pdf$" // Archivos de formato PDF
    );
    // Itero sobre los patrones
    foreach ($patrones as $patron) {
        if ($patron == ".*2.*") {
            echo "<h1>Archivos que contengan un 2</h1>";
        } elseif ($patron == "^a.*z.txt$") {
            echo "<h1>Archivos que empiecen con a y terminen con z</h1>";
        }
        elseif ($patron == ".*[0-9].*"){
            echo "<h1>Archivos que contengan numeros</h1>";
        }
        elseif($patron==".*\.pdf$"){
            echo "<h1>Archivos que sean un pdf</h1>";
        }
        else{
            echo "<h1>No cumplen ningún patrón</h1>";
        }
        foreach ($archivos as $archivo) {
            if (preg_match("/$patron/", $archivo)) {
                echo $archivo . "<br>";
            }
        }
    }
    $archivo ="./Numero2.txt";
    $contenido = file_get_contents($archivo);
    echo "<h1>El contenido del archivo Numero2.txt es:</h1> $contenido";
} else {
    echo "La carpeta no existe.";
}

?>