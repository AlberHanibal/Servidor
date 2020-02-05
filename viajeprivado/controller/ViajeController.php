<?php

namespace controller;

require_once("funciones.php");

use \model\Orm;
use \dawfony\Ti;

class ViajeController extends Controller
{

    function listarViajes($pagina = 1)
    {
        $orm = new Orm;
        if (isset($_SESSION["login"])) {
            $usuario = $orm->obtenerUsuario($_SESSION["login"]);
            $viajes = $orm->obtenerViajesCompletos($pagina);
        } else {
            $usuario = "";
            $viajes = $orm->obtenerViajes($pagina);
        }
        $numViajes = $orm->numViajes();
        global $config;
        $numPaginas = ceil($numViajes / $config["viajes_por_pagina"]);
        echo Ti::render("view/listado.phtml", compact("viajes", "usuario", "numPaginas", "pagina"));
    }
}
