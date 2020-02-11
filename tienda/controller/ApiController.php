<?php

namespace controller;

use model\OrmCesta;

class ApiController extends Controller
{
    function annadirProducto($id_producto) {
        header('Content-type: application/json');
        // prodria enviarle un objeto cesta cuando meta cantidad
        (new OrmCesta)->annadirProducto($_COOKIE["PHPSESSID"], $id_producto);
        $cesta = (new OrmCesta)->obtenerCesta($_COOKIE["PHPSESSID"]);
        $data["cesta"] = $cesta;
        $data["numArticulos"] = count($cesta);
        echo json_encode($data);
    }
}
