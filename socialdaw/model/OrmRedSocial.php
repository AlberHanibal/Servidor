<?php

namespace model;

use dawfony\Klasto;

class OrmRedSocial
{

    function insertarUsuario($usuario)
    {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO usuario (login, password, rol_id, nombre, email) VALUES (?, ?, ?, ?, ?)";
        $bd->execute($sql, [$usuario->login, $usuario->password, $usuario->rol_id, $usuario->nombre, $usuario->email]);
    }

    function obtenerUsuario($login)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT login, password, rol_id, nombre, email FROM usuario WHERE login = ?";
        return $bd->queryOne($sql, [$login], 'model\Usuario');
    }

    function obtenerTodosLosPost()
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT post.id, fecha, resumen, texto, foto, categoria_post_id, usuario_login, descripcion FROM post JOIN categoria_post ON post.categoria_post_id = categoria_post.id";
        $posts = $bd->query($sql, [], "model\Post");
        foreach ($posts as $post) {
            $post->numLikes = $this->numLikes($post->id);
            $post->numComentarios = $this->numComentarios($post->id);
        }
        return $posts;
    }

    function obtenerUnPost($id)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT post.id, fecha, resumen, texto, foto, categoria_post_id, usuario_login, descripcion FROM post JOIN categoria_post ON post.categoria_post_id = categoria_post.id WHERE post.id = ?";
        $post = $bd->queryOne($sql, [$id], "model\Post");
        $post->numLikes = $this->numLikes($post->id);
        $post->numComentarios = $this->numComentarios($post->id);
        return $post;
    }

    function nuevoSeguidor($seguidor, $seguido)
    {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO sigue (usuario_login_seguidor, usuario_login_seguido) VALUES (?, ?)";
        return $bd->execute($sql, [$seguidor, $seguido]);
    }

    function dejarDeSeguir($seguidor, $seguido)
    {
        $bd = Klasto::getInstance();
        $sql = "DELETE FROM sigue WHERE usuario_login_seguidor = ? AND usuario_login_seguido = ?";
        return $bd->execute($sql, [$seguidor, $seguido]);
    }

    function esSeguidor($seguidor, $seguido)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT usuario_login_seguidor, usuario_login_seguido FROM sigue WHERE usuario_login_seguido = ? AND usuario_login_seguidor = ?";
        return $bd->queryOne($sql, [$seguidor, $seguido]);
    }

    function seguidores($usuario)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM sigue WHERE usuario_login_seguido = ?";
        return $bd->queryOne($sql, [$usuario])["COUNT(*)"];
    }

    function siguiendo($usuario)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM sigue WHERE usuario_login_seguidor = ?";
        return $bd->queryOne($sql, [$usuario])["COUNT(*)"];
    }

    function todosSiguiendo($usuario)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT usuario_login_seguido FROM sigue WHERE usuario_login_seguidor = ?";
        return $bd->query($sql, [$usuario]);
    }

    function numLikes($idPost)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM `like` WHERE post_id = ?";
        return $bd->queryOne($sql, [$idPost])["COUNT(*)"];
    }

    function numComentarios($idPost)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM comenta WHERE post_id = ?";
        return $bd->queryOne($sql, [$idPost])["COUNT(*)"];
    }

    function leHaDadoLike($idPost, $usuario)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM `like` WHERE post_id = ? AND usuario_login = ?";
        return $bd->queryOne($sql, [$idPost, $usuario])["COUNT(*)"] > 0;
    }

    function darOQuitarLike($postid, $login)
    {
        $db = Klasto::getInstance();
        $num = $db->execute(
            "DELETE FROM `like` WHERE post_id = ? AND usuario_login = ?",
            [$postid, $login]
        );
        if ($num > 0) {
            return false; // Ya no tiene like
        }
        $db->execute(
            "INSERT INTO `like`(post_id, usuario_login) VALUES(?,?)",
            [$postid, $login]
        );
        return true; // Sí tiene like
    }

    function obtenerCategorias()
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT id, descripcion FROM categoria_post";
        return $bd->query($sql, []);
    }

    function insertarPost(&$post) {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO post (fecha, resumen, texto, foto, categoria_post_id, usuario_login) VALUES (?, ?, ?, ?, ?, ?)";
        $bd->execute($sql, [$post->fecha, $post->resumen, $post->texto, $post->foto, $post->categoria_post_id, $post->usuario_login]);
        $post->id = $bd->getInsertId();
    }

    function insertarComentario($comentario) {
        $bd = Klasto::getInstance();
        $sql = "INSERT INTO comenta (post_id, usuario_login, fecha, texto) VALUES (?, ?, ?, ?)";
        return $bd->execute($sql, [$comentario->post_id, $comentario->usuario_login, $comentario->fecha, $comentario->texto]);
    }

    function obtenerComentarios($id) {
        $bd = Klasto::getInstance();
        $sql = "SELECT post_id, usuario_login, fecha, texto FROM comenta WHERE post_id = ?";
        return $bd->query($sql, [$id], "model\Comentario");
    }

}
