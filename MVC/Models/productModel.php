<?php
    class ProductModel extends DModel {
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
            $sql = "select * from Product_color where defaultal = :defaultala and quantity > :quantity";
            $data[':defaultala']=1;
            $data[':quantity']=0;
            return $this->db->select($sql,$data);
        }
        public function getProductColorAll() {
            $sql = "select * from Product_color";
            return $this->db->select($sql);
        }
        public function updateProduct_Color($data,$condi){
            $result = $this->db->update("Product_color" ,$data,$condi);
            return $res;
        }
}
?>