<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrenamiento</title>
    <style>
        .rojo {
            color:red;
        }
        .verde {
            color:green;
        }
        .azul {
            color:blue;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        require_once "funciones.php";
        $nombre = "";
        $distancia = "";
        $tiempo = "";
        $tipoEntrenamiento = "";
        $datosCorrectos = true;
        $primerFormulario = true;

        $errorNombre = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $primerFormulario = false;
            if (empty($_POST["nombre"])) {
                $errorNombre = "Nombre es obligatorio";
                $datosCorrectos = false;
            } else {
                $nombre = trim(stripslashes(htmlspecialchars($_POST["nombre"]))); 
            }
            if ($_POST["distancia"] < 1) {
                die("Petición no correcta, distancia menor que 1");
            } else {
                $distancia = $_POST["distancia"];
            }
            if ($_POST["tiempo"] < 1) {
                die("Petición no correcta, tiempo menor que 1");
            } else {
                $tiempo = $_POST["tiempo"];
            }
            $tipoEntrenamiento = $_POST["tipoEntrenamiento"];
            if (($tipoEntrenamiento !== "carrera") && ($tipoEntrenamiento !== "bicicleta")) {
                die("Petición no correcta, no carrera/bicicleta");
            }
        
        }

        if ($primerFormulario || !$datosCorrectos) {
    ?>
        <form action="index.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <span class="error">* <?php echo "$errorNombre"?></span><br>
            <label for="distancia">Distancia (km)</label>
            <input type="number" name="distancia" id="distancia" min="1" value="<?=$distancia?>"><br>
            <label for="tiempo">Tiempo (min)</label>
            <input type="number" name="tiempo" id="tiempo" min="1" value="<?=$tiempo?>"><br>
            <label for="tipoEntrenamiento">Tipo entrenamiento</label>
            <select name="tipoEntrenamiento" id="tipoEntrenamiento">
                <option value="carrera" <?php if ($tipoEntrenamiento === "carrera") {echo "selected";}?>>Carrera</option>
                <option value="bicicleta" <?php if ($tipoEntrenamiento === "bicicleta") {echo "selected";}?>>Bicicleta</option>
            </select><br>
            <button type="submit">Calcular</button>
        </form>
    <?php
        }
        if ($datosCorrectos && !$primerFormulario) {
            $kmPorH = pasarAKmPorHora($distancia, $tiempo);
            $segundosPorKm = pasarASegundosPorKm($kmPorH);
            $formaFisica = formaFisica($segundosPorKm, $tipoEntrenamiento);
    ?>
            <p>Hola <?=$nombre?></p>
            <p>Has 
    <?php 
                if ($tipoEntrenamiento === "carrera") {
                    echo "corrido";
                } else {
                    echo "ido en bici";
                }
    ?> 
            a un ritmo de <?=$kmPorH?> kilómetros por hora, lo que supone que has hecho un kilómetro en <?=$segundosPorKm?> segundos.</p>     
            <p>Ese ritmo es 
    <?php
                if ($formaFisica == BAJO) {
                    echo "<span class='rojo'>bajo</span>";
                } else if ($formaFisica == MEDIO) {
                    echo "<span class='azul'>medio</span>";
                } else {
                    echo "<span class='verde'>alto</span>";
                }
    ?>
            </p>

    <?php
        }
    ?>
</body>
</html>