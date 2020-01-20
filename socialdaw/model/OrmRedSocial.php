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
        $sql = "SELECT post.id, fecha, resumen, texto, foto, categoria_post_id, usuario_login, descripcion FROM post LEFT JOIN categoria_post ON post.categoria_post_id = categoria_post.id";
        return $bd->query($sql, [], "model\Post");
    }

    function obtenerUnPost($id) {
        $bd = Klasto::getInstance();
        $sql = "SELECT post.id, fecha, resumen, texto, foto, categoria_post_id, usuario_login, descripcion FROM post LEFT JOIN categoria_post ON post.categoria_post_id = categoria_post.id AND post.categoria_post_id = ?";
        return $bd->queryOne($sql, [$id], "model\Post");
    }
}