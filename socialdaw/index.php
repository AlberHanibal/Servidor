<?php
require 'vendor/autoload.php';
require 'cargarconfig.php';

use \NoahBuscher\Macaw\Macaw;

/* echo "<pre>" . var_dump($_SERVER["REQUEST_URI"]) . var_dump($_SERVER["QUERY_STRING"]) . "</pre>";
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
}); */

/*
  rutas
    listado pantalla principal -> /
    registrarse -> (con el macaw get) /registro
    recibir registro -> (con el macaw post) /registro
    hacer login y recibir login igual en /login
*/

Macaw::get($URL_PATH . '/', "controller\RedSocialController@listado");

Macaw::get($URL_PATH . '/registro', "controller\RedSocialController@registro");
Macaw::post($URL_PATH . '/registro', "controller\RedSocialController@recibirRegistro");

Macaw::get($URL_PATH . '/login', "controller\RedSocialController@login");
Macaw::post($URL_PATH . '/login', "controller\RedSocialController@recibirLogin");

Macaw::get($URL_PATH . '/cerrarsesion', "controller\RedSocialController@cerrarSesion");
Macaw::dispatch();
