<?php

namespace model;

use dawfony\Klasto;

class OrmPedido
{
    function nuevoPedido(&$pedido) {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO pedido (id_usuario, estado) VALUES (?, ?)";
        $bd->execute($sql, [$pedido->id_usuario, $pedido->estado]);
        $pedido->id_pedido = $bd->getInsertId();
    }
}