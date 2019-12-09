<?php
require_once "mainview.php";
class Vista2 extends MainView
{

    function content() {
?>
    <div>
        entero: <?= $this->data["entero"]?>
    </div>
<?php
    }
}
