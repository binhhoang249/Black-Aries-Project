<?php
    class HomePageModel  extends DModel {
        public function __construct() {
            parent::__construct();
        }
        public function getProducts(){
            $sql = "select * from products";
            return $this->db->select($sql);
        }

        public function  getCatagories() {
            $sql = "select * from catagories";
            return $this->db->select($sql);
        }
        public function getProductColor() {
            $sql = "select * from Product_color";
            return $this->db->select($sql);
        }
    }
?>