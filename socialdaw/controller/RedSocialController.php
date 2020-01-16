<?php
namespace controller;

use \dawfony\Ti;

class RedSocialController extends Controller
{
    function listado() {
        $title = "Listado";
        global $URL_PATH;
        echo Ti::render("view/ListadoView.phtml", compact('title', 'URL_PATH'));
    }

    function registro() {

        $title = "Registro";
        global $URL_PATH;
        echo Ti::render("view/RegistroView.phtml", compact('title', 'URL_PATH'));
    }

    function recibirRegistro() {
        // si comprobaciones falso -> RegistroView

        // comprobaciones bien 
        global $URL_PATH;
        header("Location: $URL_PATH/login");
    }

    function login() {
        $title = "Login";
        global $URL_PATH;
        echo Ti::render("view/LoginView.phtml", compact('title', 'URL_PATH'));
    }

    function recibirLogin() {
        // si comprobaciones falso -> LoginView
        
        // comprobaciones bien 
        global $URL_PATH;
        header("Location: $URL_PATH/");
    }
}
