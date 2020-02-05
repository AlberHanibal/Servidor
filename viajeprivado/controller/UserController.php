<?php
namespace controller;

use \model\Orm;
use \dawfony\Ti;
require_once ("funciones.php");


class UserController extends Controller
{
    function login() {
        $login = "";
        $error = "";
        echo Ti::render("view/login.phtml", compact("login", "error"));
    }

    function recibirLogin() {
        $login = $_REQUEST["login"];
        $password = $_REQUEST["password"];
        $error = "";
        $hayErrores = false;
        $usuario = (new Orm)->obtenerUsuario($login);
        if (!$usuario) {
            $error = "Login incorrecto o contraseña incorrecta";
            $login = "";
            $hayErrores = true;
        } else {
            if (!password_verify($password, $usuario->password)) {
                $error = "Login incorrecto o contraseña incorrecta";
                $hayErrores = true;
            }
        }
        if (!$hayErrores) {
            session_start();
            $_SESSION["login"] = $usuario->login;
            global $URL_PATH;
            header("Location: $URL_PATH/");
        } else {
            echo Ti::render("view/login.phtml", compact("login", "error"));
        }
    }

    function cerrarSesion() {
        session_destroy();
        global $URL_PATH;
        header("Location: $URL_PATH/");
    }
 

}
