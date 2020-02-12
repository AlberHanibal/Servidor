<?php

namespace controller;

use model\OrmCesta;
use model\Producto;
use dawfony\Ti;

class CestaController extends Controller
{
    function pedido() {
        $title = "Pedido";
        $cesta = (new OrmCesta)->obtenerCesta(session_id());
        echo Ti::render("view/cesta.phtml", compact('cesta', 'title'));
    }
}