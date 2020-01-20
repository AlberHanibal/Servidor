<?php
namespace controller;

use dawfony\Ti;
use model\OrmRedSocial;
use model\Usuario;

class RedSocialController extends Controller
{
    function listado() {
        $title = "Listado";
        $posts = (new OrmRedSocial)->obtenerTodosLosPost();
        // $posts = (new OrmRedSocial)->obtenerUnPost("1");
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
}
