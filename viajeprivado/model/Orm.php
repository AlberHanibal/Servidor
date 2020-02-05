<?php

namespace model;

use dawfony\Klasto;

class Orm
{

    public function obtenerViajes($pagina = 1)
    {
        global $config;
        $limit = $config["viajes_por_pagina"];
        $offset = ($pagina - 1) * $limit;
        $viajes = Klasto::getInstance()->query(
            "SELECT `id`, `titulo`, `precio`, `imagenurl` FROM `viaje` LIMIT $limit OFFSET $offset",
            [],
            "model\Viaje"
        );
        return $viajes;
    }

    function obtenerViajesCompletos($pagina = 1)
    {
        global $config;
        $limit = $config["viajes_por_pagina"];
        $offset = ($pagina - 1) * $limit;
        $viajes = Klasto::getInstance()->query(
            "SELECT `id`, `titulo`, `precio`, `imagenurl`, precioprivado FROM `viaje` LIMIT $limit OFFSET $offset",
            [],
            "model\Viaje"
        );
        return $viajes;
    }

    function numViajes()
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT COUNT(*) FROM viaje";
        return $bd->queryOne($sql, [])["COUNT(*)"];
    }

    function obtenerDescripcion($viajeid)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT titulo, descripcion, precioprivado FROM viaje WHERE id = ?";
        return $bd->queryOne($sql, [$viajeid]);
    }

    function obtenerUsuario($login)
    {
        $bd = Klasto::getInstance();
        $sql = "SELECT `login`, `password`, nombre FROM usuario WHERE `login` = ?";
        return $bd->queryOne($sql, [$login], "model\Usuario");
    }
}
