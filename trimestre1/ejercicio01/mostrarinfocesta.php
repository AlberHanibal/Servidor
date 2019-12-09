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
        $total_compra = $_REQUEST["coste"];
        $tipo_compra = $_REQUEST["tipoCompra"];
        $precio_envio;
        if ($total_compra < 19) {
            if ($tipo_compra == "mascotas") {
                echo "No se puede realizar el envío";
            } elseif ($tipo_compra == "ropa") {
                echo "Los gastos de envío son 9 euros";
                $precio_envio = 9;
            }
        } elseif ($total_compra <= 40) {
            echo "Los gastos de envío son 9 euros";
            $precio_envio = 9;
        } elseif ($total_compra <= 200) {
            echo "Sin gastos de envío";
            $precio_envio = 0;
        } elseif ($total_compra > 200) {
            echo "Descuento: CODIGODESC33";
            $precio_envio = 0;
        }
    ?>
</body>
</html>