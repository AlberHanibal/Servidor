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

    function informePasarela() {
        // tengo que actualizar BD con lo que mande
        // mandar un json
 /*        {
    "msg": "Servidor de la tienda informado"
} */
    }

    function retornoPasarela() {
        // pillar con el pedido el estado y tal para sacar un mensaje personalizado
        var_dump($_GET);
    }
}