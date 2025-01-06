<?php
class OrderModel extends DModel
{
    public function  getCarts($user_id)
    {
        $sql = "select * from Orders where user_id = :user_id and status = :status";
        $data[':user_id'] = $user_id;
        $data[':status'] = 1;
        return $this->db->select($sql, $data);
    }
    public function addCart($data)
    {
        $result = $this->db->insert("Orders", $data);
        return $result;
    }
    public function updateCart($table, $data, $condition)
    {
        return $this->db->update($table, $data, $condition);
    }
    public function deleteCart($table, $condi)
    {
        $result = $this->db->delete($table, $condi);
        return $result;
    }
    public function getPayment()
    {
        $sql = "select * from payment";
        return $this->db->select($sql);
    }
    public function getAllOrders()
    {
        $sql = "SELECT * FROM Orders"; // Thay đổi câu truy vấn phù hợp với cấu trúc bảng của bạn
        return $this->db->select($sql);
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
        return $this->db->select($sql, $data);
    }
    public function getOrderById($orderId, $userId)
    {
        $sql = "SELECT * FROM Orders WHERE order_id = :order_id AND user_id = :user_id";
        $params = [':order_id' => $orderId, ':user_id' => $userId];

        // Sử dụng select và lấy dòng đầu tiên (nếu tồn tại)
        $result = $this->db->select($sql, $params);
        return !empty($result) ? $result[0] : null;
    }
    public function cancelOrder($orderId, $userId)
    {
        $sql = "UPDATE Orders SET status = 6 WHERE order_id = :order_id AND user_id = :user_id";

        $params = [
            ':order_id' => $orderId,
            ':user_id' => $userId
        ];
        $statement = $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $statement->bindValue($key, $value);
        }
        return $statement->execute();
    }
    public function admingetAllOrdersWithDetails() {
        $sql = "SELECT 
        o.order_id,
        o.user_id,
        o.payment_id,
        o.order_date,
        o.quantity AS order_quantity,
        p.status AS product_status, 
        o.status,
        u.fullname AS customer_name, 
        pc.quantity AS product_quantity,
        pc.image,
        p.product_name,
        pc.price AS product_price,
        (o.quantity * pc.price) AS total
    FROM 
        Orders o
    JOIN 
        Users u ON o.user_id = u.user_id
    JOIN 
        Product_color pc ON o.product_color_id = pc.product_color_id
    JOIN 
        Products p ON pc.product_id = p.product_id";
         return $this->db->select($sql);

    }
    public function searchOrders($query) {
        $queryWithoutSpaces = str_replace(' ', '', $query);
                $isNumeric = is_numeric($query);
            $sql = "SELECT 
                    o.order_id,
                    o.user_id,
                    o.payment_id,
                    o.order_date,
                    o.quantity AS order_quantity,
                    p.status AS product_status,
                    o.status,
                    u.fullname AS customer_name, 
                    pc.quantity AS product_quantity,
                    pc.image,
                    p.product_name,
                    pc.price AS product_price,
                    (o.quantity * pc.price) AS total
                FROM 
                    Orders o
                JOIN 
                    Users u ON o.user_id = u.user_id
                JOIN 
                    Product_color pc ON o.product_color_id = pc.product_color_id
                JOIN 
                    Products p ON pc.product_id = p.product_id
                WHERE ";
    
        if (strpos($query, ' ') === false) {
            if ($isNumeric) {
                $sql .= "o.order_id = :query"; 
            } else {
                $sql .= "LOWER(REPLACE(u.fullname, ' ', '')) LIKE LOWER(:query)"; 
                $query = '%' . $queryWithoutSpaces . '%'; 
            }
        } else {
            $sql .= "LOWER(REPLACE(u.fullname, ' ', '')) LIKE LOWER(:query)";
            $query = '%' . $queryWithoutSpaces . '%'; 
        }
            $data = [':query' => $query];
        return $this->db->select($sql, $data);
    }
    
    public function orderdetails($order_id) {
        $sql = "SELECT 
            o.order_id,
            o.user_id,
            o.payment_id,
            o.order_date,
            o.quantity AS order_quantity,
            p.status AS product_status, 
            o.status,
            u.fullname AS customer_name, 
            u.phone AS customer_phone,
            u.address AS customer_address,
            pc.quantity AS product_quantity,
            pc.image,
            p.product_name,
            c.category_name, 
            pc.price AS product_price,
(o.quantity * pc.price) AS total
        FROM 
            Orders o
        JOIN 
            Users u ON o.user_id = u.user_id
        JOIN 
            Product_color pc ON o.product_color_id = pc.product_color_id
        JOIN 
            Products p ON pc.product_id = p.product_id
        JOIN 
            Categories c ON p.category_id = c.category_id 
        WHERE 
            o.order_id = :order_id";
    
        return $this->db->select($sql, [':order_id' => $order_id]);
    }
    
    public function updateOrderStatus($orderId, $status)
    {
        $db = $this->db;
            $sql = "UPDATE orders SET status = :status WHERE order_id = :orderId";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    
        return $stmt->execute(); 
    }
    
}
