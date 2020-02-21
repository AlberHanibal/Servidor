<?php
require 'vendor/autoload.php';
require 'cargarconfig.php';

use \NoahBuscher\Macaw\Macaw;

session_start();

Macaw::get($URL_PATH . '/', "controller\ProductoController@listado");

Macaw::get($URL_PATH . '/api/comprar/(:num)/(:num)', "controller\ApiController@annadirProducto");
Macaw::get($URL_PATH . '/api/borrarProducto/(:num)', "controller\ApiController@borrarProducto");
Macaw::get($URL_PATH . '/api/modificarCantidad/(:num)/(:any)', "controller\ApiController@modificarCantidad");
Macaw::get($URL_PATH . '/api/comprobarEmail/(:any)', "controller\ApiController@comprobarEmail");
Macaw::post($URL_PATH . '/api/comprobarUsuario', "controller\ApiController@comprobarUsuario");
Macaw::get($URL_PATH . '/api/comprobarUsuario/(:any)/(:any)', "controller\ApiController@comprobarUsuario");
Macaw::post($URL_PATH . '/api/procesarPedido', "controller\ApiController@procesarPedido");

Macaw::get($URL_PATH . '/pedido', "controller\CestaController@pedido");

Macaw::get($URL_PATH . '/tramitarPedido', "controller\PedidoController@tramitarPedido");
Macaw::get($URL_PATH . '/informePasarela', "controller\PedidoController@informePasarela");
Macaw::get($URL_PATH . '/retornoPasarela', "controller\PedidoController@retornoPasarela");


Macaw::dispatch();