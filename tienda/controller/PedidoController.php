<?php

namespace controller;

use model\OrmCesta;
use model\Producto;
use dawfony\Ti;

class PedidoController extends Controller
{
    function tramitarPedido() {
        $title = "Tramitar Pedido";
        echo Ti::render("view/pedido.phtml", compact('title'));

    }
}