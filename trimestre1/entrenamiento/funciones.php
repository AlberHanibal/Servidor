<?php
    define("BAJO", "0");
    define("MEDIO", "1");
    define("ALTO", "2");

    function pasarAKmPorHora($km, $min) {
        $horas = $min / 60;
        return $km / $horas;
    }

    function pasarASegundosPorKm($velocidad) {
        $kmPorSegundo = $velocidad / 3600;
        return round(1 / $kmPorSegundo);
    }

    function formaFisica($segundosPorKm, $tipoEntrenamiento) {
        if ($tipoEntrenamiento === "corriendo") {
            if ($segundosPorKm <= 300) {
                return ALTO;
            } else if ($segundosPorKm <= 450) {
                return MEDIO;
            } else {
                return BAJO;
            }
        } else {
            if ($segundosPorKm <= 135) {
                return ALTO;
            } else if ($segundosPorKm <= 300) {
                return MEDIO;
            } else {
                return BAJO;
            }
        }
    }