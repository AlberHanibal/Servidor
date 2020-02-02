<?php
function sanitizar($str) {
    return htmlspecialchars(stripslashes(trim($str)));
}

function borrarFichero($ruta) {
    return unlink($ruta);
}