<?php

namespace controller;

use dawfony\Ti;

class ErrorController extends Controller
{ 
    function urlNoEncontrada() {
        http_response_code(404);
        $title = 404;
        echo Ti::render("view/404View.phtml", compact('title'));
    }

    function excepcionEncontrada($ex) {
        http_response_code(500);
        $title = 500;
        echo Ti::render("view/500View.phtml", compact('title', 'ex'));
    }
}