<?php
require_once "vista2.php";

$vista = new Vista2;
echo $vista->render(["entero"=>200]);