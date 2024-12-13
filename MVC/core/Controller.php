<?php
class Controller {
    // Hàm gọi model
    static public function model($model) {
        require_once __DIR__ . "/../model/" . $model . ".php";
        return new $model();
    }

    // Hàm gọi view
    static public function view($view, $data = []) {
        require_once __DIR__ . "/../views/" . $view . ".php";
    }
}
?>
