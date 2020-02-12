<?php

namespace controller;

use model\OrmCesta;
use model\OrmProducto;

class ApiController extends Controller
{
    function annadirProducto($id_producto, $cantidad) {
        header('Content-type: application/json');
        // prodria enviarle un objeto cesta cuando meta cantidad
        $bd = (new OrmCesta)->annadirProducto(session_id(), $id_producto, $cantidad);
        $data["cesta"] = (new OrmCesta)->obtenerCesta(session_id());
        $data["numArticulos"] = (new OrmCesta)->numProductosCesta(session_id());
        echo json_encode($data);
    }
}
