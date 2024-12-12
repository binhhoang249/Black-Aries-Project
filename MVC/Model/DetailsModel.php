<?php
    class DetailsModel  extends DModel {
        public function __construct() {
            parent::__construct();
        }
        public function getProductDetails($id) {
            $sql = "SELECT 
                        products.name, 
                        products.description, 
                        GROUP_CONCAT(product_color.price) AS prices
                    FROM 
                        products
                    INNER JOIN 
                        product_color 
                    ON 
                        products.id = product_color.product_id
                    WHERE 
                        products.id = ?
                    GROUP BY 
                        products.id";
            return $this->db->select($sql, [$id]);
        }
        
    }
?>