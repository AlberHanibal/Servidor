<?php
require 'vendor/autoload.php';
require 'cargarconfig.php';

use \NoahBuscher\Macaw\Macaw;

session_start();

Macaw::get($URL_PATH . '/', "controller\ProductoController@listado");

Macaw::get($URL_PATH . '/api/comprar/(:num)/(:num)', "controller\ApiController@annadirProducto");
Macaw::get($URL_PATH . '/api/borrarProducto/(:num)', "controller\ApiController@borrarProducto");
Macaw::get($URL_PATH . '/api/modificarCantidad/(:num)/(:any)', "controller\ApiController@modificarCantidad");

Macaw::get($URL_PATH . '/pedido', "controller\CestaController@pedido");

Macaw::dispatch();