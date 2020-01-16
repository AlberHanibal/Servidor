<?php
namespace model;
use dawfony\Klasto;

class OrmRedSocial {

    function insertarUsuario($usuario) {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO usuario (login, password, rol_id, nombre, email) VALUES (?, ?, ?, ?, ?)";
        $bd->execute($sql, [$usuario->login, $usuario->password, $usuario->rol_id, $usuario->nombre, $usuario->email]);
    }

    function obtenerUsuario($login) {
        $bd = Klasto::getInstance();
        $sql = "SELECT login, password, rol_id, nombre, email FROM usuario WHERE login = ?";
        return $bd->queryOne($sql, [$login], 'model\Usuario');
    }

    function obtenerTodosLosPost() {
        $bd = Klasto::getInstance();
        // $sql = "SELECT id, fecha, resumen, texto, foto, categoria_post_id, usuario_login, descripcion FROM post JOIN categoria_post ON categoria_post_id = id";
        $sql = "SELECT id, fecha, resumen, texto, foto, categoria_post_id, usuario_login FROM post";
        return $bd->query($sql, [], 'model\Post');
    }
}