<?php

define ("BAJO", 0);
define ("MEDIO", 1);
define ("ALTO", 2);

function sanitizar($cadena) {
    return htmlspecialchars(stripslashes(trim($cadena)));
}

function toKmh($distanciaKm, $tiempoMin) {
    return $distanciaKm / ($tiempoMin / 60);
}

function toSecs($kmH) {
    return 3600 / $kmH;
}

function calculaRitmo($secs, $tipo) {
    switch ($tipo) {
        case "carrera":
            return $secs < 300 ? ALTO : ($secs < 450 ? MEDIO : BAJO);
            break;
        default:
            return $secs < 135 ? ALTO : ($secs < 300 ? MEDIO : BAJO);
    }
}