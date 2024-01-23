<?php

// Creo los arrays de Series y Videojuegos
$series = array();
$videojuegos = array();

// Creo los objetos Serie y Videojuego
$serie1 = new Serie();
$serie1->setTitulo("Juego de Tronos");
$serie1->setNumeroTemporadas(8);
$serie1->setGenero("Fantasía");

$serie2 = new Serie();
$serie2->setTitulo("La Casa de Papel");
$serie2->setNumeroTemporadas(5);
$serie2->setGenero("Acción");

$serie3 = new Serie();
$serie3->setTitulo("Stranger Things");
$serie3->setNumeroTemporadas(4);
$serie3->setGenero("Ciencia ficción");

$serie4 = new Serie();
$serie4->setTitulo("The Witcher");
$serie4->setNumeroTemporadas(2);
$serie4->setGenero("Fantasía");

$serie5 = new Serie();
$serie5->setTitulo("The Umbrella Academy");
$serie5->setNumeroTemporadas(3);
$serie5->setGenero("Ciencia ficción");

$videojuego1 = new Videojuego();
$videojuego1->setTitulo("The Last of Us Part II");
$videojuego1->setHorasEstimadas(25);
$videojuego1->setGenero("Acción");

$videojuego2 = new Videojuego();
$videojuego2->setTitulo("Ghost of Tsushima");
$videojuego2->setHorasEstimadas(40);
$videojuego2->setGenero("Acción");

$videojuego3 = new Videojuego();
$videojuego3->setTitulo("Cyberpunk 2077");
$videojuego3->setHorasEstimadas(50);
$videojuego3->setGenero("Ciencia ficción");

$videojuego4 = new Videojuego();
$videojuego4->setTitulo("Assassin's Creed Valhalla");
$videojuego4->setHorasEstimadas(60);
$videojuego4->setGenero("Acción");

$videojuego5 = new Videojuego();
$videojuego5->setTitulo("Spider-Man: Miles Morales");
$videojuego5->setHorasEstimadas(15);
$videojuego5->setGenero("Acción");

// Añado los objetos Serie y Videojuego a los arrays
$series[] = $serie1;
$series[] = $serie2;
$series[] = $serie3;
$series[] = $serie4;
$series[] = $serie5;

$videojuegos[] = $videojuego1;
$videojuegos[] = $videojuego2;
$videojuegos[] = $videojuego3;
$videojuegos[] = $videojuego4;
$videojuegos[] = $videojuego5;

// Entrego algunos Videojuegos y Series
$series[0]->entregar();
$series[2]->entregar();
$videojuegos[1]->entregar();
$videojuegos[3]->entregar();

// Cuento cuantos Series y Videojuegos hay entregados
$series_entregadas = 0;
$videojuegos_entregados = 0;
foreach ($series as $serie) {
    if ($serie->isEntregado()) {
        $series_entregadas++;
    }
}
foreach ($videojuegos as $videojuego) {
    if ($videojuego->isEntregado()) {
        $videojuegos_entregados++;
    }
}

// Devuelvo los Series y Videojuegos entregados
foreach ($series as $serie) {
    $serie->devolver();
}
foreach ($videojuegos as $videojuego) {
    $videojuego->devolver();
}

// Indico el videojuego con más horas estimadas y la serie con más temporadas
$videojuego_mas_horas = $videojuegos[0];
foreach ($videojuegos as $videojuego) {
    if ($videojuego->getHorasEstimadas() > $videojuego_mas_horas->getHorasEstimadas()) {
        $videojuego_mas_horas = $videojuego;
    }
}

$serie_mas_temporadas = $series[0];
foreach ($series as $serie) {
    if ($serie->getNumeroTemporadas() > $serie_mas_temporadas->getNumeroTemporadas()) {
        $serie_mas_temporadas = $serie;
    }
}

// Muestro los datos en pantalla
echo "Series:<br>";
foreach ($series as $serie) {
    $serie->toString();
}

echo "Videojuego:<br>";
foreach ($videojuegos as $videojuego) {
    $videojuego->toString();
}

?>