<?php
require_once "mainview.php";
class Vista1 extends MainView 
{

    function content() {
?>
<div>
    cadena: <?=$this->data["cadena"]?>
</div>        
<?php
    }
}