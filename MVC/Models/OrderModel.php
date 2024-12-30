<?php
    class OrderModel extends DModel {
        public function  getCarts($user_id) {
            $sql = "select * from Orders where user_id = :user_id and status = :status";
            $data[':user_id']=$user_id;
            $data[':status']=1;
            return $this->db->select($sql,$data);
        }
        public function addCart($data){
            $result = $this->db->insert("Orders", $data);
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
        public function getPayment(){
            $sql = "select * from payment";
            return $this->db->select($sql);
        }  
       public function getAllOrders() {
            $sql = "SELECT * FROM Orders"; // Thay đổi câu truy vấn phù hợp với cấu trúc bảng của bạn
            return $this->db->select($sql);
        }
    
        public function getAllOrdersWithDetails() {
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
                        products p ON pc.product_id = p.product_id";
            return $this->db->select($sql);
        }
}
?>
