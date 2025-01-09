<?php
class AdminController extends controller
{
    public function index()
    {
        $data = [];
        $error = null;
        $model = self::model('UserModel');
        if (isset($_POST['signup'])) {
            $users = $model->getUsers();
            $user = null;
            foreach ($users as $value) {
                if ($value['username'] == $_POST['username']) {
                    $user = $value;
                    break;
                }
            }
            //print_r($user);
            if (!empty($user) && $user['role'] == 1) {
                if (password_verify($_POST['password'], $user['password'])) {
                    header("Location: http://localhost/Black-Aries-Project/AdminController/productManagement?position=1");
                    echo ("good");
                } else {
                    $error = "password";
                }
            } else {
                $error = "wrongAccount";
            }
        }
        self::view("Pages/AdminViews/index");
        if (!empty($error) && $error == "wrongAccount") {
            echo (" <script> document.addEventListener('DOMContentLoaded', function() { alert('Account is unexited'); }); </script>");
        } else if (!empty($error) && $error == "password") {
            echo (" <script> document.addEventListener('DOMContentLoaded', function() { alert('The password is wrong'); }); </script>");
        }
    }
    public function UserManagement()
    {
        $model = self::model('UserModel');
        if (isset($_POST['search'])) {
            $condition = "fullname LIKE '%" . trim($_POST['search_name']) . "%' and role != 1";
            $data['users'] = $model->findUser($condition);
        } else {
            $users = $model->getUsers();
            $data['users'] = [];
            foreach ($users as $user) {
                if ($user['role'] != 1) {
                    array_push($data['users'], $user);
                }
            }
        }
        self::view("Pages/AdminViews/UserManagement", $data);
    }
    public function dashBoard()
    {
        self::view("Pages/AdminViews/DashBoard");
    }
    public function productManagement()
    {
        $model = self::model('ProductModel');
        $products = $model->getProducts();
        $data['products'] = [];

        foreach ($products as $product) {
            $productDetails = $model->getProductDetails($product['product_id']);
            if (!empty($productDetails)) {
                $data['products'][] = $productDetails[0]; // Assuming getProductDetails returns an array of results
            }
        }

        self::view("Pages/AdminViews/ProductsManagement", $data);
    }

    public function orderManagement()
    {
        $model = self::model("OrderModel");
        $orders = $model->admingetAllOrdersWithDetails();

        if (!empty($orders)) {
            $data = ['result' => $orders];
        } else {
            $data = ['result' => null, 'message' => 'No orders found.'];
        }

        self::view("Pages/AdminViews/orderManagement", $data);
    }

    public function searchOrder()
    {
        if (isset($_POST['searchorder']) && !empty(trim($_POST['searchorder']))) {
            $query = trim($_POST['searchorder']);

            $model = self::model("OrderModel");
            $results = $model->searchOrders($query);
        } else {
            echo "Từ khóa tìm kiếm không hợp lệ hoặc trống!";
            return;
        }
        if ($results && !empty($results)) {
            $data['result'] = $results;
            $data['searchTerm'] = $query;
            $data['message'] = "No orders found matching your search.";


            self::view("Pages/AdminViews/orderManagement", $data);
        }
    }
    public function Order_details($order_id)
    {
        // Gọi model để lấy chi tiết đơn hàng
        $model = self::model("OrderModel");
        $orderDetails = $model->orderdetails($order_id); // Truyền order_id vào phương thức model

        // Kiểm tra nếu có dữ liệu
        if (!empty($orderDetails)) {
            $data = ['result' => $orderDetails];
        } else {
            $data = ['result' => null, 'message' => 'Không tìm thấy đơn hàng.'];
        }
        // Truyền dữ liệu vào view
        self::view("Pages/AdminViews/Orderdetails", $data);
    }

    public function updateStatusAction()
    {
        // Lấy giá trị 'order_id' và 'status' từ request (POST)
        $orderId = $_POST['order_id'] ?? null;
        $status = $_POST['status'] ?? null;

        if ($orderId && $status) {
            // Tạo đối tượng model để làm việc với dữ liệu
            $orderModel = self::model("OrderModel");

            // Gọi phương thức updateOrderStatus từ model để cập nhật trạng thái
            $result = $orderModel->updateOrderStatus($orderId, $status);

            if ($result) {
                // Sử dụng đúng đường dẫn đến view thông báo
                self::view("Pages/AdminViews/secuss_notification", $result);
            } else {
                echo "Lỗi";
            }
        } else {
            echo "Dữ liệu không hợp lệ!";
        }
    }

    public function addProduct()
    {
        $model = self::model('ProductModel');

        $productName = $_POST['product_name'] ?? null;
        $productDescription = $_POST['product_description'] ?? null;
        $productCategory = $_POST['product_category'] ?? null;
        $productStatus = $_POST['product_status'] ?? null;
        $productDiscount = $_POST['product_discount'] ?? null;
        $colors = $_POST['color'] ?? [];
        $quantities = $_POST['quantity'] ?? [];
        $prices = $_POST['price'] ?? [];
        $defaults = $_POST['default'] ?? [];
        $data = [
            'product_name' => $productName,
            'description' => $productDescription,
            'category_id' => $productCategory,
            'status' => $productStatus,
            'discount' => $productDiscount,
        ];
        print_r($data);
        if ($productName && $productCategory) {
            $productId = $model->addProduct([
                'product_name' => $productName,
                'description' => $productDescription,
                'category_id' => $productCategory,
                'status' => $productStatus,
                'discount' => $productDiscount,
            ]);
            foreach ($colors as $index => $color) {
                $data1 = [
                    'product_id' => $productId,
                    'color_id' => $color,
                    'quantity' => $quantities[$index] ?? 0,
                    'price' => $prices[$index] ?? 0,
                    'defaultal' => $defaults[$index] ?? 0,
                    'image' => $_FILES['image']['name'][$index] ?? null
                ];
                echo "------->";
                print_r($data1);
            }

            foreach ($colors as $index => $color) {
                $model->addProductColor([
                    'product_id' => $productId,
                    'color_id' => $color,
                    'quantity' => $quantities[$index] ?? 0,
                    'price' => $prices[$index] ?? 0,
                    'defaultal' => $defaults[$index] ?? 0,
                    'image' => $_FILES['image']['name'][$index] ?? null
                ]);
            }

            header("http://localhost/Black-Aries-Project/AdminController/productManagement?position=1");
        } else {
            echo "Invalid product data!";
        }
    }
    public function deleteProduct($product_id)
    {
        $model = self::model('ProductModel');
        $result = $model->deleteProduct($product_id);
        if ($result) {
            header("Location: http://localhost/Black-Aries-Project/AdminController/productManagement?position=1");
        } else {
            echo "Error";
        }
    }
}
