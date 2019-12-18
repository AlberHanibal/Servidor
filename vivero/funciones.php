<?php
function sanitizar($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}