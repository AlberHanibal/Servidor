<?php

namespace controller;

use \model\Orm;

class ApiController extends Controller
{
    function descripcionClicked($viajeid)
    {
        header('Content-type: application/json');

        if (!isset($_SESSION["login"])) {
            http_response_code(401);
            die(json_encode(["msg" => "No logueado"]));
        }
        $orm = new Orm;
        $viaje = $orm->obtenerDescripcion($viajeid);
        $data["titulo"] = $viaje["titulo"];
        $data["descripcion"] = $viaje["descripcion"];
        $data["precioprivado"] = $viaje["precioprivado"];
        echo json_encode($data);
    }
}
