<?php

function generarDados($cantidad){
    $dados = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $dados[] = rand(1, 6);
    }
    return $dados;
}

function quitarDadoMasRepetido($dados) {
    $contador = array_count_values($dados);
    $maxRepeticiones = max($contador);
    $dadosFinales = [];

    $dadosMasRepetidos = array_keys($contador, $maxRepeticiones);

    if (count($dadosMasRepetidos) > 1) {
        $dadoAleatorio = $dadosMasRepetidos[array_rand($dadosMasRepetidos)];

        foreach ($dados as $dado) {
            if ($dado != $dadoAleatorio) {
                $dadosFinales[] = $dado;
            }
        }
    } else {
        foreach ($dados as $dado) {
            if ($contador[$dado] != $maxRepeticiones) {
                $dadosFinales[] = $dado;
            }
        }
    }
    return $dadosFinales;
}



function calcularPuntuacion($dados){
    return array_sum($dados);
}

function jugarPartida(){

    $jugador1Dados = generarDados(9);
    $jugador2Dados = generarDados(9);

    $jugador1Dados = quitarDadoMasRepetido($jugador1Dados);
    $jugador2Dados = quitarDadoMasRepetido($jugador2Dados);

    $jugador1Puntuacion = calcularPuntuacion($jugador1Dados);
    $jugador2Puntuacion = calcularPuntuacion($jugador2Dados);

    echo "Jugador 1: ";
    foreach ($jugador1Dados as $dado) {
        echo "<img src='$dado.svg'>";
    }
    echo "<br>Puntuación: $jugador1Puntuacion <br>";

    echo "Jugador 2: ";
    foreach ($jugador2Dados as $dado) {
        echo "<img src='$dado.svg'>";
    }
    echo "<br>Puntuación: $jugador2Puntuacion <br>";

    if ($jugador1Puntuacion > $jugador2Puntuacion) {
        echo "El jugador 1 gana la partida";
        return "jugador1";
    } elseif ($jugador2Puntuacion > $jugador1Puntuacion) {
        echo "El jugador 2 gana la partida";
        return "jugador2";
    } else {
        echo "Empate";
        return "empate";
    }
}

$partidasJugadas = 0;
$jugador1Victorias = 0;
$jugador2Victorias = 0;

for ($i = 1; $i < 4; $i++) {
    echo "<h3>Partida $i</h3>";
    $resultado = jugarPartida();
    $partidasJugadas++;
    if ($resultado == "jugador1") {
        $jugador1Victorias++;
    } elseif ($resultado == "jugador2") {
        $jugador2Victorias++;
    }
}

echo "<h2>Resumen</h2>";
echo "Partidas jugadas: $partidasJugadas<br>";
echo "Victorias J1: $jugador1Victorias<br>";
echo "Victorias J2: $jugador2Victorias<br>";
