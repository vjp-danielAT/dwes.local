<?php

function generarActive($opcionMenu) {
    if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
        echo 'active';
    }
}

function generarHref($opcionMenu) {
    if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
        echo '#';
    } else {
        echo $opcionMenu;
    }
}

function generarActiveBlogPost($opciones) {
    $encontrado = false;
    $i = 0;
    
    while ($encontrado === false && $i < sizeof($opciones)) {
        if ($_SERVER['REQUEST_URI'] === $opciones[$i]) {
            echo 'active';
            $encontrado = true;
        } else {
            $i++;
        }
    }
}