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
        public function searchProductsByCategoryName($categoryName) {
            // Câu truy vấn tìm sản phẩm theo tên thể loại
            $sql = "
                SELECT p.product_id, p.product_name, p.description, c.category_name, 
                       pc.price, pc.image 
                FROM products p
                LEFT JOIN product_color pc ON p.product_id = pc.product_id
                LEFT JOIN categories c ON p.category_id = c.category_id
                WHERE LOWER(c.category_name) like LOWER(:categoryName)
            ";
        
            $data = [':categoryName' => $categoryName];
        
            return $this->db->select($sql, $data);
        }
                        
                // Method to search products by category name, price range, and include images
                public function searchProducts($categoryName, $minPrice, $maxPrice) {
                    $sql = "
                       SELECT p.product_id, p.product_name, p.description, c.category_name, 
                       pc.price, pc.image 
                    FROM products p
                    LEFT JOIN product_color pc ON p.product_id = pc.product_id
                    LEFT JOIN categories c ON p.category_id = c.category_id
                    WHERE LOWER(c.category_name) LIKE LOWER(:categoryName)";
                    
                    // Prepare the data array with the parameters
                    $data = [':categoryName' => "%" . $categoryName . "%"];
                   
                    if ($minPrice > 0) {
                        $sql .= " AND pc.price >= :minPrice";
                        $data[':minPrice'] = $minPrice;
                    }
                    if ($maxPrice > 0) {
                        $sql .= " AND pc.price <= :maxPrice";
                        $data[':maxPrice'] = $maxPrice;
                    }
                   
                    return $this->db->select($sql, $data);
                }
}
?>