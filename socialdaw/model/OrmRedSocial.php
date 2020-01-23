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
        $sql = "SELECT post.id, fecha, resumen, texto, foto, categoria_post_id, usuario_login, descripcion FROM post JOIN categoria_post ON post.categoria_post_id = categoria_post.id";
        return $bd->query($sql, [], "model\Post");
    }

    function obtenerUnPost($id) {
        $bd = Klasto::getInstance();
        $sql = "SELECT post.id, fecha, resumen, texto, foto, categoria_post_id, usuario_login, descripcion FROM post JOIN categoria_post ON post.categoria_post_id = categoria_post.id WHERE post.id = ?";
        return $bd->queryOne($sql, [$id], "model\Post");
    }

    function nuevoSeguidor($seguidor, $seguido) {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO sigue (usuario_login_seguidor, usuario_login_seguido) VALUES (?, ?)";
        return $bd->execute($sql, [$seguidor, $seguido]);
    }

    function dejarDeSeguir($seguidor, $seguido) {
        $bd = Klasto::getInstance();
        $sql = "DELETE FROM sigue WHERE usuario_login_seguidor = ? AND usuario_login_seguido = ?";
        return $bd->execute($sql, [$seguidor, $seguido]);
    }

    function esSeguidor($seguidor, $seguido) {
        // esta mal la select
        $bd = Klasto::getInstance();
        $sql = "SELECT usuario_login_seguidor, usuario_login_seguido FROM sigue WHERE usuario_login_seguido = ? AND usuario_login_seguidor = ?";
        return $bd->queryOne($sql, [$seguidor, $seguido]);
    }

    function seguidores($usuario) {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM sigue WHERE usuario_login_seguido = ?";
        return $bd->queryOne($sql, [$usuario])["COUNT(*)"];
    }

    function siguiendo($usuario) {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM sigue WHERE usuario_login_seguidor = ?";
        return $bd->queryOne($sql, [$usuario])["COUNT(*)"];
    }

    function todosSiguiendo($usuario) {
        $bd = Klasto::getInstance();
        $sql = "SELECT usuario_login_seguido FROM sigue WHERE usuario_login_seguidor = ?";
        return $bd->query($sql, [$usuario]);
    }

    // para la tabla like tiene que llevar ''
    // now() para insertar fecha
}