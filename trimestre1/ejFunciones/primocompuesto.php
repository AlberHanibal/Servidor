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
        function esPrimo($num) {
            $primo = true;
            for ($i=2; $i < $num / 2; $i++) { 
                if ($num % $i == 0) {
                    $primo = false;
                    break;
                }
            }
            return $primo;
        }
        $numero = 17;
        $esPrimo = esPrimo($numero);
        if ($esPrimo) {
            echo "$numero es primo";
        } else {
            echo "$numero es compuesto";
        }
    ?>
</body>
</html>