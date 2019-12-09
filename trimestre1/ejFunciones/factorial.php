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
        function factorial($n) {
            $factorial = 1;
            for ($i=1; $i <= $n; $i++) { 
                $factorial = $factorial * $i;
            }
            return $factorial;
        }
        $numero = factorial(5);
        echo "$numero";
    ?>
</body>
</html>