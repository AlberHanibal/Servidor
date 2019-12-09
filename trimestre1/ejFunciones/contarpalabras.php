<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td {
            border: 1px solid black;
            width: 40px;
            text-align: center;
        }

        table, td, tr {
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    <?php
        function contarPalabras($mensaje) {
            $mapPalabras = [];
            $palabra = "";
            for ($i=0; $i < strlen($mensaje); $i++) { 
                if (($mensaje[$i] >= "a" && $mensaje[$i] <= "z") || ($mensaje[$i] >= "A" && $mensaje[$i] <= "Z")) {
                    $palabra = $palabra . $mensaje[$i];
                } elseif (($mensaje[$i] == " ") && ($palabra != "")) {
                    if (array_key_exists($palabra, $mapPalabras)) {
                        $mapPalabras["$palabra"]++;
                    } else {
                        $mapPalabras["$palabra"] = 1;
                    }
                    $palabra = "";
                }
            }
            if ($palabra != "") { // caso de última palabra
                if (array_key_exists($palabra, $mapPalabras)) {
                    $mapPalabras["$palabra"]++;
                } else {
                    $mapPalabras["$palabra"] = 1;
                }
            }
            return $mapPalabras;
        }

        function pintarTabla($mapPalabras) {
            echo "<table>";
            foreach ($mapPalabras as $palabra => $count) {
                echo "<tr>";
                    echo "<td>$palabra</td><td>$count</td>";
                echo "</tr>";
            }
            echo "<table>";
        }

        $mapPalabras = contarPalabras("sdj sdj  a a a a aa qwieaafssadkms md la lal al la ,a.,2 3k3d, .1 '12e '12e");
        ksort($mapPalabras);
        pintarTabla($mapPalabras);
    ?>
</body>
</html>