<?php

namespace controller;

use model\OrmProducto;
use model\OrmCesta;
use dawfony\Ti;

class ProductoController extends Controller
{
    function listado() {
        $title = "Productos";
        $productos = (new OrmProducto)->obtenerProductos();
        $cesta = (new OrmCesta)->obtenerCesta($_COOKIE["PHPSESSID"]);
        $numProductos = count($cesta);
        echo Ti::render("view/listado.phtml", compact('productos', 'cesta', 'numProductos', 'title'));
    }
}
