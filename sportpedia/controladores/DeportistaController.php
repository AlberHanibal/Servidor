<?php
require_once "Controller.php";
require_once "modelo/Deportista.php";
require_once "modelo/Deporte.php";
require_once "modelo/OrmSportpedia.php";
require_once "funciones.php";

class DeportistaController extends Controller 
{
    
    function listado() {
        // Interacción con el modelo
        $OrmSportpedia = new OrmSportpedia;
        $deportistas = $OrmSportpedia->obtenerTodosDeportistas();
        $deportes = $OrmSportpedia->obtenerTodosDeportes();

        // Interacción con la vista. Pasamos los deportistas y los deportes.
        require "vistasViejas/ListadoView.php";
        $vista = new ListadoView;
        $vista -> setTitle("Listado");
        echo $vista -> render(["deportistas" => $deportistas, "deportes"=>$deportes]);
    }

    function informacion() {
        // Interacción con el modelo
        $OrmSportpedia = new OrmSportpedia;
        $deportista = $OrmSportpedia->obtenerDeportista($_REQUEST["id"]);
        $deporte = $OrmSportpedia->obtenerDeporte($deportista->id_deporte);

        require "vistasViejas/InformacionView.php";
        $vista = new InformacionView;
        $vista->setTitle("Ficha");
        echo $vista->render(["deportista" => $deportista, "deporte" => $deporte]);
    }

}
