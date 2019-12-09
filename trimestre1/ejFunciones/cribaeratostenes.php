<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .rojo {
            color: red;
        }

        .verde {
            color: green;
        }

        td {
            border: 1px solid black;
            width: 25px;
            text-align: center;
        }

        table, td, tr {
            border-collapse: collapse;
        }

    </style>
</head>
<body>
    <?php
        function eratostenes($n) {
            for ($i=2; $i <= $n ; $i++) { 
                $numeros[$i] = false;
            }
            for ($i=2; $i <= sqrt($n) ; $i++) { 
                if (!$numeros[$i]) {
                    for ($j=$i; $j <= $n / $i; $j++) { 
                        $numeros[$i*$j] = true;
                    }
                }
            }
            return $numeros;
        }

        function pintarTabla($numeros) {
            $filas = count($numeros) / 8.0;
            $contador = 2;
            echo "<table>";
            for ($i=0; $i < $filas; $i++) { 
                echo "<tr>";
                for ($j=0; $j < 8; $j++) {
                    if ($contador <= count($numeros) + 1) {
                        if ($numeros[$contador]) {
                            echo "<td class='rojo'>$contador</td>";
                        } else{
                            echo "<td class='verde'>$contador</td>";
                        }
                    } else {
                        echo "<td></td>";
                    }
                    $contador++;
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        if (isset($_REQUEST["n"])) {
            $numeros = eratostenes($_REQUEST["n"]);
        } else {
            $numeros = eratostenes(100);
        }
        pintarTabla($numeros);
    ?>
</body>
</html>