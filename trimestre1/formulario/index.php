<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        function sanearDato($dato) {
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }

        $nombre = "";
        $email = "";
        $tlf = "";
        $comentario = "";
        $genero = "";
        $pizza = "";
        $brocoli = "";
        $musica = "";
        $color = [];
        $datosCorrectos = true;
        $vecesFormulario = 0;
        $primeraVez = true;

        $nombreError = "";
        $emailError = "";
        $tlfError = "";
        $comentarioError = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $primeraVez = false;
            if (empty($_POST["nombre"])) {
                $nombreError = "Campo vacío, vuelva a introducirlo";
                $datosCorrectos = false;
            } else {
                $nombre = sanearDato($_POST["nombre"]);
            }
            if (empty($_POST["email"])) {
                $emailError = "Campo vacío, vuelva a introducirlo";
                $datosCorrectos = false;
            } else {
                $email = sanearDato($_POST["email"]);
            }
            if (!empty($_POST["tlf"])) {
                if (preg_match("/^(\+?)[\s\d]+$/", $_POST["tlf"])) {
                    $tlf = sanearDato($_POST["tlf"]);
                } else {
                    $tlfError = "Teléfono no válido, vuelva a introducirlo";
                    $datosCorrectos = false;
                }
            }
            $comentario = preg_replace("/^(<script>|<\/script>)$/", "", $_POST["comentario"]);
            // sale hacked
            if ($_POST["genero"] === "h" || $_POST["genero"] === "m") {
                $genero = $_POST["genero"];
            } else {
                die;
            }
            $pizza = $_POST["pizza"] ?? "";
            $brocoli = $_POST["brocoli"] ?? "";
            if ($_POST["musica"] === "tango" || $_POST["musica"] === "la-rosalia" || $_POST["musica"] === "kpop") {
                $musica = $_POST["musica"];
            } else {
                die;
            }
            if (isset($_POST["color"])) {
                $color = $_POST["color"];
                foreach ($color as $value) {
                    if ($value !== "azul" && $value !== "rojo" && $value !== "verde" && $value !== "negro" && $value !== "marengo") {
                        die;
                    }
                }
            }
            $vecesFormulario = $_POST["vecesMostrado"];
        }
        if (!$datosCorrectos || $primeraVez) {
            $vecesFormulario++;
    ?>

    <form action="index.php" method="POST">
        <fieldset>
            <input type="hidden" name="vecesMostrado" value="<?=$vecesFormulario?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value='<?php echo "$nombre";?>'>
            <span class="error"><?php echo "$nombreError";?></span><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value='<?php echo "$email";?>'>
            <span class="error"><?php echo "$emailError";?></span><br>
            <label for="tlf">Teléfono</label>
            <input type="text" name="tlf" id="tlf" value='<?php echo "$tlf";?>'>
            <span class="error"><?php echo "$tlfError";?></span><br>
            <label>
            Hombre<input type="radio" name="genero" value="h" <?php if ($genero === "h" || $genero == "") {echo "checked";}?> id="genero">
            </label>
            <label>
            Mujer<input type="radio" name="genero" value="m" id="genero" <?php if ($genero === "m") {echo "checked";}?>><br>
            </label>
            <label for="pizza">Pizza</label>
            <input type="checkbox" name="pizza" id="pizza" <?php if ($pizza != "") {echo "checked";}?>>
            <label for="brocoli">Brocoli</label>
            <input type="checkbox" name="brocoli" id="brocoli" <?php if ($brocoli != "") {echo "checked";}?>><br>
            <label for="comentario">Comentario</label>
            <textarea name="comentario" id="" cols="30" rows="10"><?php echo "$comentario";?></textarea>
            <span class="error"><?php echo "$comentarioError";?></span><br>
            <label for="musica">Género musical</label>
            <select name="musica" id="musica">
                <option value="tango" <?php if ($musica === "tango") {echo "selected";}?>>Tango</option>
                <option value="la-rosalia" <?php if ($musica === "la-rosalia") {echo "selected";}?>>Rosalia</option>
                <option value="kpop" <?php if ($musica === "kpop") {echo "selected";}?>>Kpop</option>
            </select><br>
            <label for="color">Colores favoritos</label>
            <select name="color[]" id="color" multiple>
                <option value="azul" <?php if (in_array("azul", $color)) {echo "selected";}?>>Azul</option>
                <option value="rojo" <?php if (in_array("rojo", $color)) {echo "selected";}?>>Rojo</option>
                <option value="verde" <?php if (in_array("verde", $color)) {echo "selected";}?>>Verde</option>
                <option value="negro" <?php if (in_array("negro", $color)) {echo "selected";}?>>Negro</option>
                <option value="marengo" <?php if (in_array("marengo", $color)) {echo "selected";}?>>Marengo</option>
            </select><br>
            <button type="submit">Enviar</button>
        </fieldset>
    </form>
    <?php
        }
        if ($datosCorrectos && !$primeraVez) {
            echo "$nombre<br>";
            echo "$email<br>";
            echo "$tlf<br>";
            echo "<div>$comentario</div><br>";
            echo "$genero<br>";
            echo "Pizza: $pizza<br>";
            echo "Brocoli: $brocoli<br>";
            echo "$musica<br>";
            echo "Colores favoritos<br>";
            foreach ($color as $value) {
                echo "$value<br>";
            }
            echo "$vecesFormulario veces";

        }
        
    ?>
</body>
</html>