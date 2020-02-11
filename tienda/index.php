<?php
require 'vendor/autoload.php';
require 'cargarconfig.php';

use \NoahBuscher\Macaw\Macaw;

session_start();

Macaw::get($URL_PATH . '/', "controller\ProductoController@listado");

Macaw::get($URL_PATH . '/api/comprar/(:num)', "controller\ApiController@annadirProducto");

Macaw::dispatch();