<?php
class Controller {
    // Hàm gọi model
    static public function model($model) {
        $list=explode('/',$model);
        $page=$list[(count($list)-1)];
        require_once __DIR__ . "/../models/" . $model . ".php";
        return new $page();
    }

    // Hàm gọi view
    static public function view($view, $data = []) {
        require_once __DIR__ . "/../views/" . $view . ".php";
    }
    static public function sendMail (){
        require_once __DIR__ . "/../Controllers/email.php";
        return new email();
    }
}
?>
