<?php
class DetailsModel extends DModel {
    public function __construct() {
        parent::__construct();
    }
    public function getProductDetails($id) {
        $sql = "SELECT 
                    products.name, 
                    products.description, 
                    product_color.images AS image, 
                    product_color.price AS price
                FROM 
                    products
                INNER JOIN 
                    product_color 
                ON 
                    products.id = product_color.product_id
                WHERE 
                    products.id = ? 
                    AND product_color.is_default = 1
                LIMIT 1";
        return $this->db->select($sql, [$id]);
    }

    public function getsliderimages($id) {
        $sql = "SELECT 
                    product_color.images AS image 
                FROM 
                    product_color
                INNER JOIN 
                    products ON products.id = product_color.product_id
                WHERE 
                    products.id = ?
                    AND product_color.is_default = 0";
        return $this->db->select($sql, [$id]);
    }
    
}


?>

