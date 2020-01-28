<?php
namespace controller;

require_once "funciones.php";
use dawfony\Ti;
use model\OrmRedSocial;
use model\Usuario;
use model\Post;
use model\Comentario;

class RedSocialController extends Controller
{
    function listado($siguiendo = false) {
        $title = "Listado";
        if (!$siguiendo) {
            $posts = (new OrmRedSocial)->obtenerTodosLosPost();
        } else {
            $posts = (new OrmRedSocial)->obtenerPostSeguidos($_SESSION["login"]);
        }
        if (isset($_SESSION["login"])) {
            foreach ($posts as $post) {
                $post->like = (new OrmRedSocial)->leHaDadoLike($post->id, $_SESSION["login"]);
            }
        }
        echo Ti::render("view/ListadoView.phtml", compact('title', 'posts'));
    }

    function registro() {
        $title = "Registro";
        echo Ti::render("view/RegistroView.phtml", compact('title'));
    }

    function recibirRegistro() {
        // si comprobaciones falso -> RegistroView
        $usuario = new Usuario;
        $usuario->login = $_REQUEST["login"];
        $usuario->password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);
        $usuario->nombre = $_REQUEST["nombre"];
        $usuario->email = $_REQUEST["email"];
        $usuario->rol_id = 0;
        (new OrmRedSocial)->insertarUsuario($usuario);
        // comprobaciones bien 
        global $URL_PATH;
        header("Location: $URL_PATH/login");
    }

    function login() {
        $login = "";
        $errorLogin = "";
        $errorPassword = "";
        $title = "Login";
        echo Ti::render("view/LoginView.phtml", compact('title', 'login', 'errorLogin', 'errorPassword'));
    }

    function recibirLogin() {
        $login = $_REQUEST["login"];
        $password = $_REQUEST["password"];
        $errorLogin = "";
        $errorPassword = "";
        $hayErrores = false;
        $usuario = (new OrmRedSocial)->obtenerUsuario($login);
        if (!$usuario) {
            $errorLogin = "Login incorrecto";
            $login = "";
            $hayErrores = true;
        } else {
            if (!password_verify($password, $usuario->password)) {
                $errorPassword = "Contraseña incorrecta";
                $hayErrores = true;
            }
        }
        if (!$hayErrores) {
            session_start();
            $_SESSION["login"] = $usuario->login;
            $_SESSION["rol"] = $usuario->rol_id;
            global $URL_PATH;
            header("Location: $URL_PATH/");
        } else {
            $title = "Login";
            echo Ti::render("view/LoginView.phtml", compact('title', 'login', 'errorLogin', 'errorPassword'));
        }
        
    }

    function cerrarSesion() {
        session_start();
        session_destroy();
        global $URL_PATH;
        header("Location: $URL_PATH/");
    }

    function formularioPost() {
        $title = "Formulario Post";
        $categorias = (new OrmRedSocial)->obtenerCategorias();
        echo Ti::render("view/FormularioPostView.phtml", compact('title', 'categorias'));
    }

    function publicarPost() {
        global $URL_PATH;
        $post = new Post;
        $post->fecha = date('Y-m-d H:i:s');
        $post->resumen = sanitizar($_REQUEST["resumen"]);
        $post->texto = sanitizar($_REQUEST["texto"]);
        $post->foto = $_FILES["foto"]["name"];
        $post->categoria_post_id = $_REQUEST["categoria_id"];
        $post->usuario_login = $_SESSION["login"];
        move_uploaded_file($_FILES["foto"]["tmp_name"], "assets/photos/" . $post->foto);
        (new OrmRedSocial)->insertarPost($post);
        header("Location: " . $URL_PATH. "/post/" . $post->id);
    }

    function insertarComentario($id) {
        global $URL_PATH;
        $comentario = new Comentario;
        $comentario->post_id = $id;
        $comentario->usuario_login = $_SESSION["login"];
        $comentario->fecha = date('Y-m-d H:i:s');
        $comentario->texto = sanitizar($_REQUEST["comentario"]);
        (new OrmRedSocial)->insertarComentario($comentario);
        header("Location: " . $URL_PATH . "/post/" . $comentario->post_id);
    }

    function post($id) {
        $esSeguidor = false;
        $title = "Post";
        $post = (new OrmRedSocial)->obtenerUnPost($id);
        $comentarios = (new OrmRedSocial)->obtenerComentarios($id);
        if (isset($_SESSION["login"])) {
            $esSeguidor = (new OrmRedSocial)->esSeguidor($post->usuario_login, $_SESSION["login"]);
        }
        $seguidores = (new OrmRedSocial)->seguidores($post->usuario_login);
        $siguiendo = (new OrmRedSocial)->siguiendo($post->usuario_login);
        echo Ti::render("view/PostView.phtml", compact('title', 'post', 'esSeguidor', 'seguidores', 'siguiendo', 'comentarios'));
    }

    function seguir($seguido, $id_post = 0) {
        (new OrmRedSocial)->nuevoSeguidor($_SESSION["login"], $seguido);
        global $URL_PATH;
        if ($id_post == 0) {
            header("Location: $URL_PATH/perfil/$seguido");
        } else {
            header("Location: $URL_PATH/post/$id_post");
        }
        
    }

    function dejarSeguir($seguido, $id_post = 0) {
        (new OrmRedSocial)->dejarDeSeguir($_SESSION["login"], $seguido);
        global $URL_PATH;
        if ($id_post == 0) {
            header("Location: $URL_PATH/perfil/$seguido");
        } else {
            header("Location: $URL_PATH/post/$id_post");
        }
    }

    function perfil($login) {
        $title = "Perfil";
        $usuario = (new OrmRedSocial)->obtenerUsuario($login);
        $posts = (new OrmRedSocial)->obtenerPostUsuario($login);
        if (isset($_SESSION["login"])) {
            $esSeguidor = (new OrmRedSocial)->esSeguidor($login, $_SESSION["login"]);
        }
        $seguidores = (new OrmRedSocial)->seguidores($login);
        $siguiendo = (new OrmRedSocial)->siguiendo($login);
        echo Ti::render("view/PerfilView.phtml", compact('title', 'usuario', 'posts', 'seguidores', 'siguiendo', 'esSeguidor'));
    }
}
