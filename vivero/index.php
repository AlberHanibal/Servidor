<?php
require_once "cargarconfig.php";
require_once "controladores/PlantasController.php";
require_once "modelo/OrmException.php";
$controller = $_REQUEST["controller"] ?? "listar";
try {
    switch ($controller) {
        case 'listar':
            (new PlantasController)->listar();
            break;
        case 'borrar':
            (new PlantasController)->borrar();
            break;
        case 'insertar':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                (new PlantasController)->recogerInsertar();
            } else {
                (new PlantasController)->insertar();
            }
            break;
        default:
            http_response_code(400);
            die("Controlador no aceptado");
            break;
    }
} catch (OrmException $ex) {
    http_response_code(500);
    die("OrmException: ".$ex->getMessage());
}