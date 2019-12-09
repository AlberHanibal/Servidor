<?php
require_once "funciones.php";
$nombre = $_REQUEST["nombre"] ?? "";
$distanciaKm = $_REQUEST["distancia"] ?? 1;
$tiempoMin = $_REQUEST["tiempo"] ?? 1;
$tipo = $_REQUEST["tipo"] ?? "carrera";
$errorNombre = "";
$primeraVez = !isset($_REQUEST["nombre"]);
$errores = false;

if (!$primeraVez) {
    if ($distanciaKm < 1 || $tiempoMin < 1 || !in_array($tipo, ["carrera", "bicicleta"])) {
        die("petición incorrecta");
    }
    $nombre = sanitizar($nombre);
    if ($nombre == "") {
        $errorNombre = "No puede estar vacío";
        $errores = true;
    }
}


if ($primeraVez || $errores) {
    require "templates/formulario.phtml";
} else {
    $kmH = toKmh($distanciaKm, $tiempoMin);
    $secs = toSecs($kmH);
    $ritmo = calculaRitmo($secs, $tipo);
    $ritmos = ["bajo", "medio", "alto"];


    require "templates/resultado.phtml";
}
