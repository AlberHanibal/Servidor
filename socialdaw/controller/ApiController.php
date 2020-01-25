<?php

namespace controller;

use \model\Usuario;
use \model\OrmRedSocial;

require_once("funciones.php");

class ApiController extends Controller
{
    public function likeClicked($postid)
    {
        // mandar la data como cuerpo de la respuesta
        // ¡¡ RECORDAR cambiar el Content-type, si no, se asumiría html
        header('Content-type: application/json');

        if (!isset($_SESSION["login"])) {
            http_response_code(403);
            die(json_encode(["msg" => "No logueado"]));
        }

        // Programar para que
        // devuelva el estado y la cantidad de likes para un post
        // dado su id
        $data["estado"] = (new OrmRedSocial)->darOQuitarLike($postid, $_SESSION["login"]);
        $data["numLikes"] = (new OrmRedSocial)->numLikes($postid);

        echo json_encode($data);
    }

    public function existeLogin($login)
    {
        // mandar la data como cuerpo de la respuesta
        // ¡¡ RECORDAR cambiar el Content-type, si no, se asumiría html
        header('Content-type: application/json');

        // Programar para que
        // devuelva true o false
        // dado su id
        $data["estado"] = (bool) rand(0, 1);


        echo json_encode($data);
    }
}
