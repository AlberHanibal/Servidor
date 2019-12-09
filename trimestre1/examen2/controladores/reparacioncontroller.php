<?php
require_once "controller.php";
require_once "modelo/ormreparaciones.php";
class ReparacionController extends Controller {

    function listado() {
        $reparaciones = (new OrmReparaciones)->obtenerReparaciones();
        $totalHoras = (new OrmReparaciones)->totalHoras();
        require "vistas/listado.phtml";
    }

    function aumentar($id) {
        (new OrmReparaciones)->aumentarHora($id);
        header("Location: index.php");
    }

    function borrarPorTermino($busqueda) {
        (new OrmReparaciones)->borrarConBusqueda($busqueda);
        require "vistas/borrado.phtml";
    }
}