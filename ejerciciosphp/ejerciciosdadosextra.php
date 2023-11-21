<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


function tirarDado() {
    return rand(1, 6);
}

function determino_el_ganador($jugador1, $jugador2) {
    if ($jugador1 > $jugador2) {
        return 1;
    } elseif ($jugador1 < $jugador2) {
        return 2;
    } else {
        return 0; // Empate
    }
}

$ganadasJugador1 = 0;
$ganadasJugador2 = 0;
$puntosJugador1=array();
$puntosJugador2=array();
$empate=true;

// Realizo las tiradas
for ($i = 1; $i <= 6; $i++) {
    // Tirada de cada jugador
    $tiradaJugador1 = tirarDado();
    $tiradaJugador2 = tirarDado();
    $puntosJugador1[$i]=$tiradaJugador1;
    $puntosJugador2[$i]=$tiradaJugador2;
    
    //Veo quien es el ganador
    $ganador = determino_el_ganador($tiradaJugador1, $tiradaJugador2);

    if ($ganador == 1) {
        $ganadasJugador1++;
    } elseif ($ganador == 2) {
        $ganadasJugador2++;
    }
    
    // Resultados de la tirada
    echo "Tirada $i: Jugador 1: $tiradaJugador1, Jugador 2: $tiradaJugador2, Ganador: ";
    if ($ganador == 1) {
        echo "Jugador 1";
    } elseif ($ganador == 2) {
        echo "Jugador 2";
    } else {
        echo "Empate";
    }
    echo "<br>";
}

//Funcion para ver quien gana en el empate, se resuelve sumando los puntos obtenidos en las rondas
function empate($empate,$puntosJugador1,$puntosJugador2,$ganadasJugador1,$ganadasJugador2){

if($empate==false){
    $puntostotalesJugador1=array_sum($puntosJugador1);
    $puntostotalesJugador2=array_sum($puntosJugador2);
    
    if($puntostotalesJugador1>$puntostotalesJugador2){
        $ganadasJugador1++;
    }
    else{
        $ganadasJugador2++;
    }
}
}

if($ganadasJugador1==$ganadasJugador2){
    $empate=false;
    empate($empate,$puntosJugador1,$puntosJugador2,$ganadasJugador1,$ganadasJugador2);
}

// Muestro el resultado final
echo "<br>Resultado final:<br>";
echo "Jugador 1: $ganadasJugador1 victorias<br>";
echo "Jugador 2: $ganadasJugador2 victorias<br>";

?>
</body>
</html>