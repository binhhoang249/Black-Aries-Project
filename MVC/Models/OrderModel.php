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
        $sql = "select * from Payments";
        return $this->db->select($sql);
    }
    public function getAddress_OrderBy_User_id($user_id){
        $sql = "select * from Address_Order where user_id = :user_id";
        $data[':user_id'] = $user_id;
        return $this->db->select($sql,$data);
    }
    public function addAddress_Order($data){
        $result = $this->db->insert("Address_Order", $data);
        return $result;
    }
    public function updateAddress_Order($data,$condition){
        $result = $this->db->update("Address_Order", $data,$condition);
        return $result;
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
                        Product_colors pc ON o.product_color_id = pc.product_color_id
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
    public function admingetAllOrdersWithDetails()
    {
        $sql = "SELECT 
        o.order_id,
        o.user_id,
        o.payment_id,
        o.order_date,
        o.quantity AS order_quantity,
        p.status AS product_status,  -- Sử dụng status từ bảng Products
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
        Product_colors pc ON o.product_color_id = pc.product_color_id
    JOIN 
        Products p ON pc.product_id = p.product_id";
        return $this->db->select($sql);
    }
    public function searchOrders($query)
    {
        // Loại bỏ dấu cách trong chuỗi tìm kiếm
        $queryWithoutSpaces = str_replace(' ', '', $query);

        // Kiểm tra xem input có phải là một số (mã đơn hàng)
        $isNumeric = is_numeric($query);

        // Tạo câu lệnh SQL
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
                    Product_colors pc ON o.product_color_id = pc.product_color_id
                JOIN 
                    Products p ON pc.product_id = p.product_id
                WHERE ";
        // Xử lý trường hợp nếu không có dấu cách trong chuỗi
        if (strpos($query, ' ') === false) {
            if ($isNumeric) {
                // Nếu query là số và không có dấu cách (tìm theo order_id)
                $sql .= "o.order_id = :query";
            } else {
                // Nếu query không phải là số và không có dấu cách (tìm theo fullname)
                $sql .= "LOWER(REPLACE(u.fullname, ' ', '')) LIKE LOWER(:query)"; // Loại bỏ dấu cách trong fullname
                $query = '%' . $queryWithoutSpaces . '%'; // Chuẩn bị tham số cho tìm kiếm theo tên không có dấu cách
            }
        } else {
            // Nếu có dấu cách, tìm kiếm theo fullname
            $sql .= "LOWER(REPLACE(u.fullname, ' ', '')) LIKE LOWER(:query)"; // Loại bỏ dấu cách trong fullname
            $query = '%' . $queryWithoutSpaces . '%'; // Chuẩn bị tham số cho tìm kiếm theo tên không có dấu cách
        }

        // Thực thi câu lệnh và trả về kết quả
        $data = [':query' => $query];
        return $this->db->select($sql, $data);
    }




    public function orderdetails($order_id)
    {
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
            c.category_name, -- Lấy tên thể loại
            pc.price AS product_price,
(o.quantity * pc.price) AS total
        FROM 
            Orders o
        JOIN 
            Users u ON o.user_id = u.user_id
        JOIN 
            Product_colors pc ON o.product_color_id = pc.product_color_id
        JOIN 
            Products p ON pc.product_id = p.product_id
        JOIN 
            Categories c ON p.category_id = c.category_id -- Kết nối với bảng Categories
        WHERE 
            o.order_id = :order_id";

        return $this->db->select($sql, [':order_id' => $order_id]);
    }

    public function updateOrderStatus($orderId, $status)
    {
        // Kết nối đến cơ sở dữ liệu
        $db = $this->db;

        // Tạo câu lệnh SQL với placeholder
        $sql = "UPDATE Orders SET status = :status WHERE order_id = :orderId";

        // Chuẩn bị câu lệnh SQL
        $stmt = $db->prepare($sql);

        // Gán giá trị cho các placeholder
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);

        // Thực thi câu lệnh SQL
        return $stmt->execute(); // Nếu thành công, trả về true
    }
}
