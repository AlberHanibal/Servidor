<?php

namespace model;

use dawfony\Klasto;
use model\Cesta;

class OrmCesta
{
    function annadirProducto($id_visitante, $id_producto, $cantidad = 1) {
        $bd = Klasto::getInstance();
        $sql = "UPDATE cesta SET cantidad = cantidad + ? WHERE id_visitante = ? AND id_producto = ?";
        $lineasActualizadas = $bd->execute($sql, [$cantidad, $id_visitante, $id_producto]);
        if ($lineasActualizadas == 0) {
            $sql = "INSERT INTO cesta (id_visitante, id_producto, cantidad) VALUES (?, ?, ?)";
            return $bd->execute($sql, [$id_visitante, $id_producto, $cantidad]);
        }
        return $lineasActualizadas;
    }

    function obtenerCesta($id_visitante) {
        $bd = Klasto::getInstance();
        $sql = "SELECT id_visitante, cesta.id_producto, cantidad, nombre, descripcion, foto, precio FROM cesta JOIN producto ON cesta.id_producto = producto.id_producto WHERE id_visitante = ?";
        return $bd->query($sql, [$id_visitante], "model\Cesta");
    }

    function numProductosCesta($id_visitante) {
        $bd = Klasto::getInstance();
        $sql = "SELECT SUM(cantidad) FROM cesta WHERE id_visitante = ?";
        return $bd->queryOne($sql, [$id_visitante])["SUM(cantidad)"];
    }
}
