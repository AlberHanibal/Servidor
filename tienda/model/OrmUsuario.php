<?php

namespace model;

use dawfony\Klasto;

class OrmUsuario
{
    function existeLogin($login)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM usuario WHERE login = ?";
        return $bd->queryOne($sql, [$login])["COUNT(*)"];
    }

    function obtenerUsuario($login)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT login, nombre, contrasena, direccion FROM usuario WHERE login = ?";
        return $bd->queryOne($sql, [$login], "model\Usuario");
    }

    function annadirUsuario($usuario)
    {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO usuario (login, nombre, contrasena, direccion) VALUES (?, ?, ?, ?)";
        return $bd->execute($sql, [$usuario->login, $usuario->nombre, $usuario->contrasena, $usuario->direccion]);
    }
}
