<?php
require_once "view.php";

class MainView extends View {

    function content() {
        echo "contenido de MainView";
    }

    function main() {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header style="border: 2px solid blue">
        <h1>Título</h1>
    </header>
    <?php $this->content()?>
    <footer style="border: 2px solid red">
        Copyright 2019
    </footer>
</body>
</html>

<?php
    }

}