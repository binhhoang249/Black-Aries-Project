<?php
class DModel {
    protected $db;
    public function __construct() {
        $connect = 'mysql:dbname=Black_Aries; host=localhost; charset=utf8';
        $user = 'root';
        $pass = 'worldforme';
        $this->db = new Database($connect, $user, $pass);
    }
}