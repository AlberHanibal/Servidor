<?php
require_once "Controller.php";
require_once "modelo/Planeta.php";
require_once "modelo/OrmPlanetas.php";
require_once "funciones.php";
class PlanetasController extends Controller {
    
    function listado() {
        $planetas = (new OrmPlanetas)->obtenerTodosPlanetas();
        require "vistas/listado.phtml"; 
    }
    function insertar() {
        $planeta = new Planeta;
        $planeta->nombre = "";
        $planeta->peso = 0;
        $planeta->radio = 0;
        $error_msg ="";
        require "vistas/planetaform-insertar.phtml";
    }
    function recogerInsertar() {
        $planeta = new Planeta;
        $planeta->nombre = sanitizar($_REQUEST["nombre"] ?? "");
        $planeta->peso = $_REQUEST["peso"] ?? 0;
        $planeta->radio = $_REQUEST["radio"] ?? 0;
        $error_msg ="";
        $hayErrores = false;
        if ($planeta->nombre == "") {
            $error_msg .="Por favor, rellene el nombre.";
            $hayErrores = true;
        }
        if (!$hayErrores) {
            (new OrmPlanetas)->insertar($planeta);
            header("Location: ?controller=listado");
        } else {
            require "vistas/planetaform-insertar.phtml";    
        }
    }
    function confirmarBorrado() {
        $id = $_REQUEST["id"];
        require "vistas/borradoconfirmar.phtml";
    }
    
    function borradoEfectivo() {
        $id = $_REQUEST["id"];
        (new OrmPlanetas)->borrar($id);
        require "vistas/borradoefectuado.phtml";
    }
    function modificar() {
        $id = $_REQUEST["id"];
        $error_msg="";
        $planeta = (new OrmPlanetas)->obtenerPlaneta($id);
        require "vistas/planetaform-modificar.phtml";
    }
    function recogerModificacion() {
        $planeta = new Planeta;
        $planeta->id = $_REQUEST["id"];
        $planeta->nombre = sanitizar($_REQUEST["nombre"] ?? "");
        $planeta->peso = $_REQUEST["peso"] ?? 0;
        $planeta->radio = $_REQUEST["radio"] ?? 0;
        $error_msg ="";
        $hayErrores = false;
        if ($planeta->nombre == "") {
            $error_msg .="Por favor, rellene el nombre.";
            $hayErrores = true;
        }
        if (!$hayErrores) {
            (new OrmPlanetas)->modificar($planeta);
            header("Location: ?controller=listado");
        } else {
            require "vistas/planetaform-modificar.phtml";    
        }
    }
}