<?php

function calcularImc($peso, $altura) {
    return $peso / ($altura ** 2);
}