<?php
require_once "Planeta.php";
class OrmPlanetas{
    public function obtenerConexion() {
        global $_DB;
        $conn = new mysqli($_DB["db_host"], $_DB["db_user"], $_DB["db_pass"], $_DB["db_name"]);
        if ($conn->connect_error) {
            throw new OrmException("No se pudo conectar a la BD: " . $conn->connect_error );
        }
        return $conn;
    }
    
    public function obtenerTodosPlanetas(){
        $conn = $this->obtenerConexion();
        $sql = "SELECT id, nombre, radio, peso FROM planetas";
        $result = $conn->query($sql);//statment sin preparar, porque no tiene parámetros
        $planetas = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_object("Planeta")) {
                array_push($planetas, $row);
            }
            
        }
        $conn->close();
        return $planetas;
    }
    public function obtenerPlaneta($id){
        $conn = $this->obtenerConexion();
        $sql = "SELECT id, nombre, radio, peso FROM planetas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $planeta = null;
        if ($result->num_rows > 0) {
            $planeta = $result->fetch_object("Planeta");
        }
        $stmt->close();            
        $conn->close();
        return $planeta;
    }
    public function insertar($planeta){
        $conn = $this->obtenerConexion();
        $sql = "INSERT INTO planetas(nombre, peso, radio) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $planeta->nombre, $planeta->peso, $planeta->radio);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    public function modificar($planeta){
        $conn = $this->obtenerConexion();
        $sql = "UPDATE planetas SET nombre=?, peso=?, radio=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siii", $planeta->nombre, $planeta->peso, $planeta->radio,$planeta->id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    public function borrar($id){
        $conn = $this->obtenerConexion();
        $sql = "DELETE FROM planetas WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}