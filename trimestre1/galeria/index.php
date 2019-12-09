<?php
$dir = "fotos/";
$arrayFotos = scandir($dir, 1);
// para quitar del array el . y ..
array_pop($arrayFotos);
array_pop($arrayFotos);

require "vista.phtml";