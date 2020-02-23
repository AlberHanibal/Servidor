<?php

namespace controller;

use model\OrmPedido;
use model\OrmUsuario;
use model\OrmCesta;
use dawfony\Ti;

class PedidoController extends Controller
{
    function tramitarPedido()
    {
        $title = "Tramitar Pedido";
        echo Ti::render("view/pedido.phtml", compact('title'));
    }

    function informePasarela()
    {
        (new OrmPedido)->actualizarPedido($_REQUEST["cod_pedido"], $_REQUEST["estado"]);
        $data["msg"] = "Servidor de la tienda informado";
        echo json_encode($data);
    }

    function retornoPasarela()
    {
        $pedido = (new OrmPedido)->obtenerPedido($_REQUEST["cod_pedido"]);
        if ($pedido->estado === "ok") {
            (new OrmCesta)->borrarCestaUsuario(session_id());
        }
        $usuario = (new OrmUsuario)->obtenerUsuario($pedido->id_usuario);
        $mensaje = "";
        $h1 = "";
        if ($pedido->estado === "ok") {
            $h1 = "Pago realizado con éxito!";
            $mensaje = "Su pedido se ha realizado con éxito, muchas gracias por comprar en Amazon " . $usuario->nombre . "!";
        } else if ($pedido->estado === "nook") {
            $h1 = "Ha ocurrido algo inesperado";
            $mensaje = "No se ha podido realizar el pago " . $usuario->nombre . ", inténtelo más tarde";
        } else if ($pedido->estado === "cancelado") {
            $h1 = "Pago cancelado";
            $mensaje = "Ha cancelado su pago, esperemos verle pronto " . $usuario->nombre . "!";
        }
        $title = "Retorno pago";
        echo Ti::render("view/retorno.phtml", compact('title', 'h1', 'mensaje'));
    }
}
