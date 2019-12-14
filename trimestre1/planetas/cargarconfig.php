<?php
if (!file_exists("config.ini")) {
    require "instalacion/instalar.php";
    exit();
} else {
    $_DB=parse_ini_file("config.ini");
}