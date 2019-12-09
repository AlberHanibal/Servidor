<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        function contadorVocales($mensaje) {
            $vocales = array (
                "a" => 0,
                "e" => 0,
                "i" => 0,
                "o" => 0,
                "u" => 0,
                "A" => 0,
                "E" => 0,
                "I" => 0,
                "O" => 0,
                "U" => 0
            );
            for ($i=0; $i < strlen($mensaje); $i++) { 
                switch ($mensaje[$i]) {
                    case "a":
                    $vocales["a"]++;
                    break;
                    case "e":
                    $vocales["e"]++;
                    break;
                    case "i":
                    $vocales["i"]++;
                    break;
                    case "o":
                    $vocales["o"]++;
                    break;
                    case "u":
                    $vocales["u"]++;
                    break;
                    case "A":
                    $vocales["A"]++;
                    break;
                    case "E":
                    $vocales["E"]++;
                    break;
                    case "I":
                    $vocales["I"]++;
                    break;
                    case "O":
                    $vocales["O"]++;
                    break;
                    case "U":
                    $vocales["U"]++;
                    break;
                    default:
                }
            }
            return $vocales;
        }
        $vocales = array();
        $vocales = contadorVocales("asdjiqwemcAJDSOQWEMC");
        foreach ($vocales as $key => $value) {
            printf("%s => %u<br>",$key, $value);
        }
    ?>
</body>
</html>