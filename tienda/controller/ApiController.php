<?php

namespace controller;

use model\OrmCesta;
use model\Usuario;
use model\Pedido;
use model\OrmUsuario;
use model\OrmPedido;

require "funciones.php";

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

    function procesarPedido()
    {
        header('Content-type: application/json');
        $json = file_get_contents('php://input');
        $dataRecibida = json_decode($json);
        $login = "";
        if (isset($dataRecibida->usuario)) {
            $login = $dataRecibida->usuario;
            echo json_encode($dataRecibida);
        } else {
            $usuario = new Usuario();
            $usuario->login = sanitizar($dataRecibida->login);
            $usuario->contrasena = password_hash($dataRecibida->contrasena, PASSWORD_DEFAULT);
            $usuario->nombre = sanitizar($dataRecibida->nombre);
            $usuario->direccion = sanitizar($dataRecibida->direccion);
            (new OrmUsuario)->annadirUsuario($usuario);
            $login = $usuario->login;
            echo json_encode($dataRecibida->nombre);
        }
        $pedido = new Pedido();
        $pedido->id_usuario = $login;
        $pedido->estado = 0;
        // (new OrmPedido)->nuevoPedido($pedido);
    }
}
