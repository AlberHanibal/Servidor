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
        function cambiarVocales($mensaje) {
            $mensaje = str_replace("a", "i", $mensaje);
            $mensaje = str_replace("e", "i", $mensaje);
            $mensaje = str_replace("o", "i", $mensaje);
            $mensaje = str_replace("u", "i", $mensaje);
            return $mensaje;
        }

        $mensaje = cambiarVocales("hola");
        echo "$mensaje";    
    ?>
</body>
</html>