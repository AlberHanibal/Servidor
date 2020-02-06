<?php
require 'vendor/autoload.php';
require 'cargarconfig.php';

use \NoahBuscher\Macaw\Macaw;

session_start();

Macaw::get($URL_PATH . '/', "controller\ProductoController@listado");




Macaw::dispatch();