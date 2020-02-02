<?php

namespace controller;

use \model\OrmRedSocial;
require_once("funciones.php");

class AdminController extends Controller
{
    function borrarPost($postId) {
        if (($_SESSION["rol"] != 1)) {
            throw new \Exception("Intento de borrado de post de usuario no administrador");
        }
        $foto = (new OrmRedSocial)->obtenerUnPost($postId)->foto;
        (new OrmRedSocial)->borrarPost($postId);
        borrarFichero("assets/photos/" . $foto);
        global $URL_PATH;
        header("Location: $URL_PATH/");
    }

    function borrarUsuario($usuario) {
        if (($_SESSION["rol"] != 1)) {
            throw new \Exception("Intento de borrado de usuario de usuario no administrador");
        }
        $fotos = (new OrmRedSocial)->obtenerFotos($usuario);
        (new OrmRedSocial)->borrarUsuario($usuario);
        foreach ($fotos as $foto) {
            borrarFichero("assets/photos/" . $foto["foto"]);
        }
        global $URL_PATH;
        header("Location: $URL_PATH/");
    }
}

