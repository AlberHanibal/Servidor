<?php
$router = true;
require_once "cargarconfig.php";
require_once "controladores/PlanetasController.php";
require_once "modelo/OrmException.php";
$controller = $_REQUEST["controller"] ?? "listado";
try {
    switch ($controller) {
        case "nuevo":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                (new PlanetasController)->recogerInsertar();
            } else {
                (new PlanetasController)->insertar();
            }
            break;
        case "modificacion":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                (new PlanetasController)->recogerModificacion();
            } else {
                (new PlanetasController)->modificar();
            }
            break;
        case "listado":
            (new PlanetasController)->listado();
            break;
        case "borrado":
            (new PlanetasController)->confirmarBorrado();
            break;
        case "borrado-efectivo":
            (new PlanetasController)->borradoEfectivo();
            break;
        default:
            die("controlador solicitado desconocido");
            break;
    }
} catch (OrmException $ex) {
    http_response_code(500);
    $error_msg = "[OrmException: " . $ex->getMessage() . "]";
    require "vistas/500.phtml";
} catch (Exception $ex) {
    http_response_code(500);
    $error_msg = "[" . $ex->getMessage() . "]";
    require "vistas/500.phtml";
}
