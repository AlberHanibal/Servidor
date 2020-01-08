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
        $limiteDatos = 6;
        $pagina = $_REQUEST["pagina"] ?? 1;
        $id_deporte = $_REQUEST["deporteSeleccionado"] ?? "";
        $deportistas = $OrmSportpedia->obtenerTodosDeportistas($id_deporte, $limiteDatos, $pagina);
        $deportes = $OrmSportpedia->obtenerTodosDeportes();
        $totalDeportistas = $OrmSportpedia->obtenerCantidadDeportistas($id_deporte);
        $numPaginas = ceil($totalDeportistas / $limiteDatos);
        $title = "Listado";

        // Interacción con la vista. Pasamos los deportistas y los deportes.
        echo Ti::render("vistas/ListadoView.phtml", compact('deportistas', 'deportes', 'title', 'numPaginas'));
    }

    function informacion() {
        $OrmSportpedia = new OrmSportpedia;
        $deportista = $OrmSportpedia->obtenerDeportista($_REQUEST["id"]);
        $deporte = $OrmSportpedia->obtenerDeporte($deportista->id_deporte);
        $title = "Ficha";

        echo Ti::render("vistas/InformacionView.phtml", compact('deportista', 'deporte', 'title'));
    }

    function annadirDeportista() {
        $OrmSportpedia = new OrmSportpedia;
        $deportes = $OrmSportpedia->obtenerTodosDeportes();
        $title = "Insertar Deportista";

        echo Ti::render("vistas/AnnadirView.phtml", compact('deportes', 'title'));
    }

}
