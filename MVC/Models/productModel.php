<?php
class ProductModel extends DModel
{
    public function getProduct($id)
    {
        $sql = "SELECT * from products where product_id = :id";
        $data[':id'] = (int)$id;
        return $this->db->select($sql, $data);
    }
    public function getProduct_color($id)
    {
        $sql = "SELECT * from Product_color where product_id = :id";
        $data[':id'] = (int)$id;
        return $this->db->select($sql, $data);
    }
    public function  getColor()
    {
        $sql = "select * from color";
        return $this->db->select($sql);
    }
    public function updateColor($data,$condition){
        return $this->db->update("color",$data,$condition);
    }
    public function deleteColor($data){
        $result = $this->db->delete('color', $data);
        return $result;
    }
    public function addColor($data){
        return $this->db->insert("color",$data);
    }
    //all
    public function getProducts()
    {
        $sql = "select * from products";
        return $this->db->select($sql);
    }
    public function addCategory($data){
        return $this->db->insert("categories",$data);
    }
    public function  getCatagories()
    {
        $sql = "select * from categories";
        return $this->db->select($sql);
    }
    public function deleteCategory($data){
        $result = $this->db->delete('categories', $data);
        return $result;
    }
    public function updateCategory($data,$condition){
        return $this->db->update("categories",$data,$condition);
    }
    public function getProductColor()
    {
        $sql = "select * from Product_color where defaultal = :defaultala and quantity > :quantity";
        $data[':defaultala'] = 1;
        $data[':quantity'] = 0;
        return $this->db->select($sql, $data);
    }
    public function getProductColorAll()
    {
        $sql = "select * from Product_color";
        return $this->db->select($sql);
    }
    public function updateProduct_Color($data, $condi)
    {
        $result = $this->db->update("Product_color", $data, $condi);
        return $result;
    }
    public function getAllOrdersWithDetails($userId)
    {
        $sql = "SELECT 
                    o.order_id,
                    o.user_id,
                    o.product_color_id,
                    o.payment_id,
                    o.order_date,
                    o.quantity AS order_quantity,
                    o.price AS order_price,
                    o.status,
                    pc.quantity AS product_quantity,
                    pc.image,
                    pc.price AS product_price,
                    p.product_name
                FROM 
                    orders o
                JOIN 
                    product_color pc ON o.product_color_id = pc.product_color_id
                JOIN 
                    products p ON pc.product_id = p.product_id
                WHERE 
                    o.user_id = :userId";
        $data[':userId'] = $userId;

        $result = $this->db->select($sql, $data);
        return $result ?: []; // Trả về mảng rỗng nếu không có kết quả
    }

    public function getOrderById($orderId, $userId)
    {
        $sql = "SELECT * FROM Orders WHERE order_id = :order_id AND user_id = :user_id";
        $params = [':order_id' => $orderId, ':user_id' => $userId];

        $result = $this->db->select($sql, $params);
        return !empty($result) ? $result[0] : null; // Trả về dòng đầu tiên hoặc null
    }

    public function updateCart($table, $data, $condi, $params)
    {
        return $this->db->update($table, $data, $condi, $params);
    }

    public function getProductDetails($productId)
    {
        $sql = "SELECT 
                    p.product_id, 
                    p.product_name, 
                    p.description, 
                    p.time_stamp, 
                    p.category_id, 
                    p.status, 
                    p.discount, 
                    p.popular, 
                    c.color_id, 
                    c.color_name, 
                    c.color_link, 
                    pc.product_color_id, 
                    pc.quantity, 
                    pc.image, 
                    pc.price, 
                    pc.defaultal
                FROM 
                    products p
                LEFT JOIN 
                    Product_color pc ON p.product_id = pc.product_id
                LEFT JOIN 
                    Color c ON pc.color_id = c.color_id
                WHERE 
                    p.product_id = :product_id";
        $data[':product_id'] = (int)$productId;
        return $this->db->select($sql, $data);
    }
    public function addProduct($data)
    {
        $this->db->insert("Products", $data);
        return $this->db->lastInsertId();
    }

    public function addProductColor($data)
    {
        return $this->db->insert("Product_color", $data);
    }
}
