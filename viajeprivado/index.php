<?php
require 'vendor/autoload.php'; // El autoload de las clases gestionadas por composer
require 'cargarconfig.php'; // Carga de la configuración, autoload para nuestras clases y tareas de inicialización

use NoahBuscher\Macaw\Macaw;

session_start();

/* DEFINICIÓN DE RUTAS */

// página principal
Macaw::get($URL_PATH . '/', "controller\ViajeController@listarViajes");
Macaw::get($URL_PATH . '/pagina/(:num)', "controller\ViajeController@listarViajes");

// login
Macaw::get($URL_PATH . '/login', "controller\UserController@login");
Macaw::post($URL_PATH . '/login', "controller\UserController@recibirLogin");

// cerrar sesion
Macaw::get($URL_PATH . '/cerrarSesion', "controller\UserController@cerrarSesion");

// api infoViaje
Macaw::get($URL_PATH . '/api/descripcionViaje/(:num)', "controller\ApiController@descripcionClicked");

// Despachar rutas

Macaw::dispatch();
