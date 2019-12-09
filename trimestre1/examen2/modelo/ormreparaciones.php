<?php
require_once "reparacion.php";
class OrmReparaciones {

    function conectarBD() {
        global $_DB;
        $conn = new mysqli($_DB["servidor"], $_DB["usuario"], $_DB["contrasena"], $_DB["nombre"]);
        if ($conn->connect_error) {
            throw new OrmException("Error la conectar con la BD" . $conn->connect_error);
        }
        return $conn;
    }

    function obtenerReparaciones() {
        $conn = $this->conectarBD();
        $sql = "SELECT id, descripcion, horas, comentario FROM reparacion";
        $result = $conn->query($sql);
        $reparaciones = [];
        while ($fila = $result->fetch_object("Reparacion")) {
            array_push($reparaciones, $fila);
        }
        $conn->close();
        return $reparaciones;
    }

    function totalHoras() {
        $conn = $this->conectarBD();
        $sql = "SELECT SUM(horas) as totalHoras FROM reparacion";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $conn->close();
        return $row["totalHoras"];
    }

    function aumentarHora($id) {
        $conn = $this->conectarBD();
        $stmt = $conn->prepare("UPDATE reparacion SET horas = horas + 1 WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $conn->close();
    }

    function borrarConBusqueda($busqueda) {
        $conn = $this->conectarBD();
        $stmt = $conn->prepare("DELETE FROM reparacion WHERE descripcion LIKE ? OR comentario LIKE ?");
        $busqueda = "%" . $busqueda . "%";
        $stmt->bind_param("ss", $busqueda, $busqueda);
        $stmt->execute();
        $conn->close();
    }
}