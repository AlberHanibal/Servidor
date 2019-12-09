<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            display: inline-block;
            margin: 10px 10px 10px 10px;
        }

        td {
            width: 40px;
            border: 1px solid black;
        }

        table, td, th {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php
        function tablaMultiplicar($n) {
    ?>
            <table>
                <caption>Tabla del <?=$n?></caption>
    <?php
            for ($i=0; $i <= 10 ; $i++) { 
    ?>
                <tr>
                    <td><?=$n?>x<?=$i?></td>
                    <td><?=$n*$i?></td>
                </tr>
    <?php
            }
    ?>
            </table>
    <?php
        }

        for ($i=1; $i <= 10 ; $i++) { 
            tablaMultiplicar($i);
        }
    ?>
</body>
</html>