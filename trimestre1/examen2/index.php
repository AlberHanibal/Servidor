<?php
require "cargarconfiguracion.php";
require_once "controladores/reparacioncontroller.php";

$controller = $_REQUEST["controller"] ?? "listado";
try {
    switch ($controller) {
    case 'listado':
        (new ReparacionController)->listado();
        break;
    case 'aumentar':
        (new ReparacionController)->aumentar($_REQUEST["id"]);
        break;
    case 'borrarportermino':
        (new ReparacionController)->borrarPorTermino($_REQUEST["busqueda"]);
        break;
    default:
        die("Hacker");
        break;
}
} catch (Exception $e) {
    http_response_code(500);
    echo "Excepcion";
}
