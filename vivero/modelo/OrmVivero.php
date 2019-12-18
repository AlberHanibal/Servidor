<?php
require_once "Planta.php";
require_once "OrmException.php";

class OrmVivero
{
    function conectarBD() {
        global $_DB;
        $conn = new mysqli($_DB["db_host"], $_DB["db_user"], $_DB["db_pass"], $_DB["db_name"]);
        if ($conn->connect_error) {
            throw new OrmException("Conexión fallida: " . $conn->connect_error);
        }
        return $conn;
    }

    function obtenerPlantas() {
        $conn = $this->conectarBD();
        $sql = "SELECT id, nombre, precio, ambiente FROM plantas";
        $result = $conn->query($sql);
        $plantas = [];
        while ($row = $result->fetch_object("Planta")) {
            array_push($plantas, $row);
        }
        $conn->close();
        return $plantas;
    }

    function obtenerPlanta($id) {
        $conn = $this->conectarBD();
        $stmt = $conn->prepare("SELECT id, nombre, precio, ambiente FROM plantas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $planta = $result->fetch_object("Planta");
        $stmt->close();
        $conn->close();
        return $planta;
    }

    function borrarPlanta($id) {
        $conn = $this->conectarBD();
        $stmt = $conn->prepare("DELETE FROM plantas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function existeNombre($nombre) {
        $conn = $this->conectarBD();
        $stmt = $conn->prepare("SELECT id, nombre, precio, ambiente FROM plantas WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();
        $existe = $result->num_rows > 0;
        $stmt->close();
        $conn->close();
        return $existe;
    }

    function insertarPlanta($planta) {
        $conn = $this->conectarBD();
        $stmt = $conn->prepare("INSERT INTO plantas (nombre, precio, ambiente) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $planta->nombre, $planta->precio, $planta->ambiente);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

}