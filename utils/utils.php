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