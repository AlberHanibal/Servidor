<?php
require_once "Controller.php";
require_once "modelo/Planta.php";
require_once "modelo/OrmVivero.php";
require_once "funciones.php";
class PlantasController extends Controller 
{

    function listar() {
        $plantas = (new OrmVivero)->obtenerPlantas();
        require "vistas/listado.phtml";
    }

    function borrar() {
        $id = $_REQUEST["id"];
        if (isset($_REQUEST["borrado"])) {
            if ($_REQUEST["borrado"] == "si") {
                (new OrmVivero)->borrarPlanta($id);
                header("Location: ?controller=listar");
            }
        }
        $planta = (new OrmVivero)->obtenerPlanta($id);
        require "vistas/confirmarborrado.phtml";
    }

    function insertar() {
        $planta = new Planta;
        $planta->nombre = "";
        $planta->precio = 0;
        $planta->ambiente = "I";
        $errorNombre = "";
        require "vistas/insertarform.phtml";
    }

    function recogerInsertar() {
        $planta = new Planta;
        $planta->nombre = sanitizar($_REQUEST["nombre"] ?? "");
        $planta->precio = $_REQUEST["precio"] ?? 0;
        $planta->ambiente = $_REQUEST["ambiente"] ?? "I";
        $errorNombre = "";
        $hayErrores = false;

        if ($planta->nombre == "") {
            $errorNombre = "Nombre vacio, es obligatorio";
            $hayErrores = true;
        } else {
            $nombreExiste = (new OrmVivero)->existeNombre($planta->nombre);
            if ($nombreExiste) {
                $errorNombre = "Ese nombre ya existe, lo tienes que cambiar";
                $hayErrores = true;
            }
        }
        if ($planta->precio < 0) {
            http_response_code(400);
            die("Parámetros de la petición http incorrectos");
        }
        if (!($planta->ambiente == "I" || $planta->ambiente == "E" || $planta->ambiente == "M")) {
            http_response_code(400);
            die("Parámetros de la petición http incorrectos");
        }

        if (!$hayErrores) {
            (new OrmVivero)->insertarPlanta($planta);
            header("Location: ?controller=listar");
        } else {
            require "vistas/insertarform.phtml";
        }
    }
}