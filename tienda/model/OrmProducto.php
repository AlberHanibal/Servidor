<?php

namespace model;

use dawfony\Klasto;

class OrmProducto
{
    function obtenerProductos() {
        $bd = Klasto::getInstance();
        $sql = "SELECT id_producto, nombre, descripcion, foto, precio FROM producto";
        return $bd->query($sql, [], "model\Producto");
    }
}
