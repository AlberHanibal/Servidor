<?php

namespace model;

use dawfony\Klasto;

class OrmPedido
{
    function nuevoPedido(&$pedido)
    {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO pedido (id_usuario, estado) VALUES (?, ?)";
        $bd->execute($sql, [$pedido->id_usuario, $pedido->estado]);
        $pedido->id_pedido = $bd->getInsertId();
    }

    function completarPedido($pedido, $cesta)
    {
        $bd = Klasto::getInstance();
        $bd->startTransaction();
        foreach ($cesta as $producto) {
            $sql = "INSERT INTO `producto-pedido` (id_pedido, id_producto, cantidad) VALUES (?, ?, ?)";
            $bd->execute($sql, [$pedido, $producto->id_producto, $producto->cantidad]);
        }
        $bd->commit();
    }

    function actualizarPedido($pedido, $estado)
    {
        $bd = Klasto::getInstance();
        $sql = "UPDATE pedido SET estado = ? WHERE id_pedido = ?";
        $bd->execute($sql, [$estado, $pedido]);
    }

    function obtenerPedido($pedido)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT id_pedido, id_usuario, estado FROM pedido WHERE id_pedido = ?";
        return $bd->queryOne($sql, [$pedido], "model\Pedido");
    }
}
