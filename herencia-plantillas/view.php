<?php
class View {

    public $data;

    function main() {
        echo "en el main";
    }

    function render($data = []) : string {
        $this->data = $data;
        ob_start();
        $this->main();
        return ob_get_clean();
    }
}