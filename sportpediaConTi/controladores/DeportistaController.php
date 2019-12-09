<?php
require_once "Controller.php";
require_once "modelo/Deportista.php";
require_once "modelo/Deporte.php";
require_once "modelo/OrmSportpedia.php";
require_once "funciones.php";
require_once "vistas/Ti.php";

class DeportistaController extends Controller 
{
    
    function listado() {
        // Interacción con el modelo
        $OrmSportpedia = new OrmSportpedia;
        $deportistas = $OrmSportpedia->obtenerTodosDeportistas();
        $deportes = $OrmSportpedia->obtenerTodosDeportes();

        // Interacción con la vista. Pasamos los deportistas y los deportes.
        echo Ti::render("vistas/ListadoView.phtml", ["deportistas" => $deportistas, "deportes" => $deportes, "title" => "Listado"]);
    }

    function informacion() {
        // Interacción con el modelo
        $OrmSportpedia = new OrmSportpedia;
        $deportista = $OrmSportpedia->obtenerDeportista($_REQUEST["id"]);
        $deporte = $OrmSportpedia->obtenerDeporte($deportista->id_deporte);

        echo Ti::render("vistas/InformacionView.phtml", ["deportista" => $deportista, "deporte" => $deporte, "title" => "Ficha"]);
    }

}
