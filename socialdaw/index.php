<?php
require 'vendor/autoload.php';
require 'cargarconfig.php';

use NoahBuscher\Macaw\Macaw;
use controller\PruebaController;

echo "<pre>" . var_dump($_SERVER["REQUEST_URI"]) . var_dump($_SERVER["QUERY_STRING"]) . "</pre>";
Macaw::get($URL_PATH . '/', function () {
  echo 'principal';
});

Macaw::get($URL_PATH . '/demo', function () {
  echo 'demo';
});

// "slugs" con expresiones regulares en la url
// Un slug es una parte variable de una url amigable para SEO.
// Equivalenet a un parámetro.
// Macaw admite tres abreviaturas:  :any, :int :all

Macaw::get($URL_PATH . '/demo/(:any)',function ($slug) {
  echo "demo $slug";
});

// Pasando el nombre de una clase de controlador y un método,
// Macaw lo puede invocar directamente.

Macaw::get($URL_PATH . '/demo2/(:any)', "controller\PruebaController@foo");


// Captura de URL no definidas.
Macaw::error(function() {
  echo '404 :: Not Found';
});

Macaw::dispatch();
