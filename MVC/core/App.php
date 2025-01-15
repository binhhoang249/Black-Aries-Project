<?php
    class App {
        protected $controller = "HomeController";
        protected $action = "index";
        protected $params;
        function __construct() {
           $arr = $this->UrlProcess();
        // Xu li controller, no se goi controller nao, cu the hon la page nao
        if(isset($arr[0])){
            if( file_exists("./MVC/controllers/" . $arr[0] . ".php") ) {
                $this->controller = $arr[0];  
            } 
            unset($arr[0]);
        }
        require_once "./MVC/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        // Xu li fuction, no se goi thang function nao-Action
        if(isset($arr[1])  ) {
            if(method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // Xu li params
        $this->params = $arr?array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params);
        }
        
        function UrlProcess () {
            if (isset($_GET["url"])) {
                return explode("/",filter_var(trim($_GET["url"], "/")));
            } 
        }
    }
?>