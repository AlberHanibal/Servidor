<?php
class Planeta {
    public $id;
    public $nombre;
    public $radio;
    public $peso;
    
    function calcularSuperficie(){
        $area = 4 * pi() * $this->radio ** 2;
        return $area;
    }
}