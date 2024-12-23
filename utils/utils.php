<?php

/* Genera el atributo active en las distintas opciones del menú,
para resaltar la opción de la página en la que te encuentres */
function generarActive($opcionMenu) {
    if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
        echo 'active';
    }
}

/* Genera el contenido del atributo href de las opciones del menú.
Si pulsas sobre la misma página en la que ya estás no se recargará,
si no que te llevará de vuelta a la parte superior */
function generarHref($opcionMenu) {
    if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
        echo '#';
    } else {
        echo $opcionMenu;
    }
}

// Genera el atributo active para las páginas blog y single_post
function generarActiveBlogPost($opciones) {
    if ($_SERVER['REQUEST_URI'] === $opciones[0] || $_SERVER['REQUEST_URI'] === $opciones[1]) {
        echo 'active';
    }
}

/* Devuelve una cadena que genera un tipo de div u otro dependiendo
de si hay errores en la subida de imágenes o no */
function errorOMensaje($error) {
    if (empty($error)) {
        return 'info';
    } else {
        return 'danger';
    }
}

// Extrae 3 elementos aleatorios de un array
function extraer3Aleatorios($array) {
    shuffle($array);
    $tresAleatorios = array_slice($array, 0, 3);
    return $tresAleatorios;
}