<?php
class Controller {
    static public function model($model) {
        require_once __DIR__ . "/../model/" . $model . ".php";
        return new $model();
    }
    static public function view($view, $data = []) {
        require_once __DIR__ . "/../views/" . $view . ".php";
    }
}
?>
