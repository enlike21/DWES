<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Ejercicio2/ejercicio2.css">
</head>
<body>
    <!--Escriba un programa que muestre un número del cero al 9 al azar y escriba en letras el valor obtenido.-->
    <div>
    <?php
    
    // Genero un número aleatorio del cero al nueve
    $numero = rand(0, 9);
    
    // Muestro el número en letras
    echo "Número: " . $numero . "<br><br>";

    function numero_en_letras($numero) {
        switch ($numero) {
            case 0:
                return "cero";
            case 1:
                return "uno";
            case 2:
                return "dos";
            case 3:
                return "tres";
            case 4:
                return "cuatro";
            case 5:
                return "cinco";
            case 6:
                return "seis";
            case 7:
                return "siete";
            case 8:
                return "ocho";
            case 9:
                return "nueve";
            default:
                return "Número inválido";
        }
    }
    
    echo "En letras: " . numero_en_letras($numero);    

    ?>
    </div>
</body>
</html>