<?php
$router || die ("Solo se puede ejecutar este script pasando por el router y detectando"
     ." que no existe el fichero config.ini");
$host = $_REQUEST["host"] ?? "";
$user = $_REQUEST["user"] ?? "";
$pass = $_REQUEST["pass"] ?? "";
$name = $_REQUEST["name"] ?? "";
$error_msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
        $error_msg = "No se pudo conectar.";
        require "instalarform.phtml";
    } else if (!$conn->select_db($name)) {
        $error_msg = "Se estableció la conexión pero no se pudo acceder a la BD";
        require "instalarform.phtml";
    } else {
        $sql=file_get_contents(__DIR__ . "/planetas.sql");
        $conn->multi_query($sql);
        $conn->close();
        $config =
            "db_host=$host\n"
            ."db_user=$user\n"
            ."db_pass=$pass\n"
            ."db_name=$name\n";
        file_put_contents("config.ini", $config);
        require "instalarexito.phtml";
    }
} else {
    require "instalarform.phtml";
}