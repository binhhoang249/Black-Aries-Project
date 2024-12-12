<?php
    class DetailsModel  extends DModel {
        public function __construct() {
            parent::__construct();
        }
        public function getProduct($id) {
            $sql = "SELECT * from products where product_id = :id";
            $data[':id']=(int)$id;
            return $this->db->select($sql, $data);
        }
        public function getProduct_color($id) {
            $sql = "SELECT * from Product_color where product_id = :id";
            $data[':id']=(int)$id;
            return $this->db->select($sql, $data);
        }
        public function  getColor() {
            $sql = "select * from color";
            return $this->db->select($sql);
        }
    }
?>