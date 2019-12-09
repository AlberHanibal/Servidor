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
        function pintarFila($altura) {
            echo "<tr>";
            echo "<td>$altura</td>";
            $pesoMin = 18.5 * (($altura / 100) ** 2);
            echo "<td>$pesoMin</td>";
            echo "</tr>";
        }
    
    ?>

    <table>
        <tr>
            <th>Altura en cm</th>
            <th>Peso mínimo</th>
        </tr>
        <?php
            for ($altura = 140; $altura < 240; $altura++) { 
                pintarFila($altura);
            }
        ?>
    </table>

</body>
</html>