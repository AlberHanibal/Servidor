<?php

namespace controller;

use model\OrmCesta;
use model\OrmProducto;

class ApiController extends Controller
{
    function annadirProducto($id_producto) {
        header('Content-type: application/json');
        // prodria enviarle un objeto cesta cuando meta cantidad
        (new OrmCesta)->annadirProducto(session_id(), $id_producto);
        $data["productoAnnadido"] = (new OrmProducto)->obtenerProducto($id_producto);
        $data["numArticulos"] = (new OrmCesta)->numProductosCesta(session_id());
        echo json_encode($data);
    }
}
