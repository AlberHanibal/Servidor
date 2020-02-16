<?php

namespace controller;

use model\OrmCesta;
use model\OrmUsuario;

class ApiController extends Controller
{
    function annadirProducto($id_producto, $cantidad)
    {
        header('Content-type: application/json');
        (new OrmCesta)->annadirProducto(session_id(), $id_producto, $cantidad);
        $data["cesta"] = (new OrmCesta)->obtenerCesta(session_id());
        $data["numArticulos"] = (new OrmCesta)->numProductosCesta(session_id());
        echo json_encode($data);
    }

    function borrarProducto($id_producto)
    {
        header('Content-type: application/json');
        $data["producto"] = (new OrmCesta)->obtenerProductoCesta(session_id(), $id_producto);
        $data["productosBorrados"] = (new OrmCesta)->borrarProducto(session_id(), $id_producto);
        echo json_encode($data);
    }

    function modificarCantidad($id_producto, $modif)
    {
        header('Content-type: application/json');
        $data["productosModificados"] = (new OrmCesta)->modificarCantidad(session_id(), $id_producto, $modif);
        $data["producto"] = (new OrmCesta)->obtenerProductoCesta(session_id(), $id_producto);
        echo json_encode($data);
    }

    function comprobarEmail($email)
    {
        header('Content-type: application/json');
        $data["emailExiste"] = (new OrmUsuario)->existeLogin($email);
        echo json_encode($data);
    }

    // con get
    /* function comprobarUsuario($login, $password) {
        
        header('Content-type: application/json');
        $usuario = (new OrmUsuario)->obtenerUsuario($login);
        if ($usuario != false) {
            $data["usuarioCorrecto"] = password_verify($password, $usuario->contrasena);
        } else {
            $data["usuarioCorrecto"] = false;
        }
        echo json_encode($data);
    } */
    function comprobarUsuario()
    {
        header('Content-type: application/json');
        $json = file_get_contents('php://input');
        $dataRecibida = json_decode($json);
        $usuario = (new OrmUsuario)->obtenerUsuario($dataRecibida->login);
        if ($usuario != false) {
            $data["usuarioCorrecto"] = password_verify($dataRecibida->password, $usuario->contrasena);
        } else {
            $data["usuarioCorrecto"] = false;
        }
        echo json_encode($data);

    }
}
