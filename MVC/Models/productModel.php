<?php
    class productModel extends DModel {
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
        public function  getCarts($user_id) {
            $sql = "select * from carts";
            $data[':user_id']=$user_id;
            return $this->db->select($sql);
        }
        //all
        public function getProducts(){
            $sql = "select * from products";
            return $this->db->select($sql);
        }

        public function  getCatagories() {
            $sql = "select * from categories";
            return $this->db->select($sql);
        }
        public function getProductColor() {
            $sql = "select * from Product_color where defaultal = :defaultala";
            $data[':defaultala']=1;
            return $this->db->select($sql,$data);
        }
    }
?>
