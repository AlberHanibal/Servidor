<?php
class Planta 
{
    public $id;
    public $nombre;
    public $precio;
    public $ambiente;

    public function riego() {
        return ((0.3 / $this->precio) * 7);
    }
}