<?php
class ProductModel extends DModel
{
    public function getProduct($id)
    {
        $sql = "SELECT * from Products where product_id = :id AND status = 1";
        $data[':id'] = (int)$id;
        return $this->db->select($sql, $data);
    }
    public function getProduct_color($id)
    {
        $sql = "SELECT * from Product_colors where product_id = :id";
        $data[':id'] = (int)$id;
        return $this->db->select($sql, $data);
    }
    public function  getColor()
    {
        $sql = "select * from Colors";
        return $this->db->select($sql);
    }
    public function updateColor($data, $condition)
    {
        return $this->db->update("Colors", $data, $condition);
    }
    public function deleteColor($data)
    {
        $result = $this->db->delete('Colors', $data);
        return $result;
    }
    public function addColor($data)
    {
        return $this->db->insert("Colors", $data);
    }
    //all
    public function getProducts()
    {
        $sql = "select * from Products where status = 1";
        return $this->db->select($sql);
    }
    public function addCategory($data)
    {
        return $this->db->insert("Categories", $data);
    }
    public function  getCatagories()
    {
        $sql = "select * from Categories";
        return $this->db->select($sql);
    }
    public function deleteCategory($data)
    {
        $result = $this->db->delete('Categories', $data);
        return $result;
    }
    public function updateCategory($data, $condition)
    {
        return $this->db->update("Categories", $data, $condition);
    }
    public function getProductColor()
    {
        $sql = "select * from Product_colors where defaultal = :defaultala and quantity > :quantity";
        $data[':defaultala'] = 1;
        $data[':quantity'] = 0;
        return $this->db->select($sql, $data);
    }
    public function getProductColorAll()
    {
        $sql = "select * from Product_colors";
        return $this->db->select($sql);
    }
    public function updateProduct_Color($data, $condi)
    {
        $result = $this->db->update("Product_colors", $data, $condi);
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
                    Orders o
                JOIN 
                    Product_colors pc ON o.product_color_id = pc.product_color_id
                JOIN 
                    Products p ON pc.product_id = p.product_id
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
                Products p
            LEFT JOIN 
                Product_colors pc ON p.product_id = pc.product_id
            LEFT JOIN 
                Colors c ON pc.color_id = c.color_id
            WHERE 
                p.product_id = :product_id";
        $data[':product_id'] = (int)$productId;
        return $this->db->select($sql, $data);
    }
    public function getProductByName($productName)
    {
        $sql = "SELECT * FROM Products WHERE product_name = :product_name";
        $data[':product_name'] = $productName;
        return $this->db->select($sql, $data);
    }

    public function getProductColorByProductIdAndColorId($productId, $colorId)
    {
        $sql = "SELECT * FROM Product_colors WHERE product_id = :product_id AND color_id = :color_id";
        $data[':product_id'] = (int)$productId;
        $data[':color_id'] = (int)$colorId;
        return $this->db->select($sql, $data);
    }

    public function addProduct($data)
    {
        return $this->db->insert("Products", $data);
    }

    public function addProductColor($data)
    {
        return $this->db->insert("Product_colors", $data);
    }

    public function deleteProduct($condition)
    {
        $result = $this->db->delete('Products', $condition);
        return $result;
    }
    public function searchProductsByCategoryName($categoryName)
    {
        // Câu truy vấn tìm sản phẩm theo tên thể loại
        $sql = "
            SELECT p.product_id, p.product_name, p.description, c.category_name, 
                   pc.price, pc.image 
            FROM products p
            LEFT JOIN Product_colors pc ON p.product_id = pc.product_id
            LEFT JOIN categories c ON p.category_id = c.category_id
            WHERE LOWER(c.category_name) like LOWER(:categoryName)
            AND defaultal = 1 AND status = 1
        ";
        $categoryName='%'.$categoryName.'%';
        $data = [':categoryName' => $categoryName];

        return $this->db->select($sql, $data);
    }

    // Method to search products by category name, price range, and include images
    public function searchProducts($categoryName, $minPrice, $maxPrice)
    {
        $sql = "
                   SELECT p.product_id, p.product_name, p.description, c.category_name, 
                   pc.price, pc.image 
                FROM products p
                LEFT JOIN Product_colors pc ON p.product_id = pc.product_id
                LEFT JOIN categories c ON p.category_id = c.category_id
                WHERE LOWER(c.category_name) LIKE LOWER(:categoryName)
                AND defaultal = 1 AND status = 1
                ";

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

    public function getCategories()
    {
        $sql = "SELECT * FROM Categories";
        return $this->db->select($sql);
    }

    public function getColors()
    {
        $sql = "SELECT * FROM Colors";
        return $this->db->select($sql);
    }
}
