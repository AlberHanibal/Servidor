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
        $numDados = 5;
        $suma = 0;
        for ($i=0; $i < $numDados; $i++) { 
            $dado[$i] = rand(1,6);
            $suma = $suma + $dado[$i];
            $enlace = $dado[$i] . ".png";
    ?>   
            <img src=<?=$enlace?>>
    <?php
        }
        echo "Total ", $suma;
    ?>
</body>
</html>