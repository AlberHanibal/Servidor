<?php

namespace controller;

use model\OrmProducto;
use model\Producto;
use dawfony\Ti;

class ProductoController extends Controller
{
    function listado() {
        $title = "Productos";
        $productos = (new OrmProducto)->obtenerProductos();
        echo Ti::render("view/listado.phtml", compact('productos', 'title'));
    }
}
