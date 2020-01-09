<?php
use \clases\importante\Uno;
spl_autoload_register(
    function ($nombreClase) {
        $filename = str_replace("\\", "/", $nombreClase) . ".php";
        echo "Intento cargar el fichero: " . $filename . "<br>";
        require_once $filename;
    }
);

echo "Estoy en index. Hola<br>";
$a = new Uno;
$a->saludo();