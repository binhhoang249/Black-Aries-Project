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
            $sql = "select * from Older";
            $data[':user_id']=$user_id;
            $data[':status']=1;
            return $this->db->select($sql);
        }
        public function addCart($data){
            $result = $this->db->insert("Older", $data);
            return $result;
        }
        public function updateCart($table,$data,$condi){
            $result = $this->db->update($table, $data,$condi);
            return $result;
        }
        public function deleteCart($table,$condi){
            $result = $this->db->delete($table,$condi);
            return $result;
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
        public function getProductColorAll() {
            $sql = "select * from Product_color";
            return $this->db->select($sql);
        }
        public function getPayment(){
            $sql = "select * from payment";
            return $this->db->select($sql);
        }
    }
?>
