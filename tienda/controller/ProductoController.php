<?php

namespace controller;

use model\OrmProducto;
use model\OrmCesta;
use dawfony\Ti;

class ProductoController extends Controller
{
    function listado()
    {
        $title = "Productos";
        $productos = (new OrmProducto)->obtenerProductos();
        $cesta = (new OrmCesta)->obtenerCesta(session_id());
        $numProductos = (new OrmCesta)->numProductosCesta(session_id());


        echo Ti::render("view/listado.phtml", compact('productos', 'cesta', 'numProductos', 'title'));
    }
}
