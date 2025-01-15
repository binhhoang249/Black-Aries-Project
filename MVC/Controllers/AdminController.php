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
                    header("Location: http://localhost/Black-Aries-Project/AdminController/DashBoard?position=1");
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
        $categories = $model->getCategories(); // Lấy danh sách categories
        $colors = $model->getColors(); // Lấy danh sách colors
        $data['products'] = [];
        $data['categories'] = $categories; // Truyền danh sách categories đến view
        $data['colors'] = $colors; // Truyền danh sách colors đến view

        foreach ($products as $product) {
            $productDetails = $model->getProductDetails($product['product_id']);
            if (!empty($productDetails)) {
                $product['colors'] = $productDetails; // Assuming getProductDetails returns an array of results
                $data['products'][] = $product;
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
        $data = $this->infomationProduct();
        $dataProduct=['product_name' => $data['product_name'],'description' => $data['description'],'category_id' => $data['category_id'],
            'status' => $data['status'],'discount' => $data['discount'],
        ];
        print_r(($data));
        if ($data['product_name'] && $data['category_id']) {
            // Kiểm tra xem sản phẩm đã tồn tại hay chưa
            $existingProduct = $model->getProductByName($data['product_name']);
            print_r($existingProduct);
            if ($existingProduct) {
                $productId = $existingProduct[0]['product_id'];
                // Kiểm tra xem màu sắc đã tồn tại hay chưa
                foreach ($data['colors'] as $index => $colorId) {
                    $existingColor = $model->getProductColorByProductIdAndColorId($productId, $colorId);
                    if ($existingColor) {
                        echo "<script>alert('Màu sắc đã tồn tại cho sản phẩm này!'); window.history.back();</script>";
                        return;
                    }
                }
                // Thêm màu sắc mới cho sản phẩm đã tồn tại
                foreach ($data['colors']as $index => $colorId) {
                    $dir = 'public/images/products/';
                    $beforeName = $this->getNameImage();
                    $name_file = $beforeName . basename($data['images']['name'][$index]);
                    $target_file = $dir . $name_file;
                    $colorData = ['product_id' => $productId, 'color_id' => $colorId,'quantity' => $data['quantities'][$index],
                     'price' => $data['prices'][$index],'defaultal' => $data['defaults'][$index],'image' => $name_file,
                    ];
                    move_uploaded_file($data['images']['tmp_name'][$index], $target_file);
                    $model->addProductColor($colorData);
                }
            } else {
                // Thêm sản phẩm mới
                $model->addProduct($dataProduct);
                $product_curent = $model->getProductByName($data['product_name']);
                $productId = $product_curent[0]['product_id'];
                // Thêm màu sắc cho sản phẩm mới
                foreach ($data['colors'] as $index => $colorId) {
                    $dir = 'public/images/products/';
                    $beforeName = $this->getNameImage();
                    $name_file = $beforeName . basename($data['images']['name'][$index]);
                    $target_file = $dir . $name_file;
                    $colorData = [
                        'product_id' => $productId,
                        'color_id' => $colorId,
                        'quantity' => $data['quantities'][$index],
                        'price' => $data['prices'][$index],
                        'defaultal' => $data['defaults'][$index],
                        'image' => $name_file,
                    ];
                    move_uploaded_file($data['images']['tmp_name'][$index], $target_file);
                    $model->addProductColor($colorData);
                }
            }
            header("Location: http://localhost/Black-Aries-Project/AdminController/productManagement?position=1");
        } else {
            //echo "<script>alert('Invalid product data!'); window.history.back();</script>";
        }
    }
    public function deleteProduct()
    {
        $id_product = $_POST['product_id'] ?? null;
        echo $id_product;
        $condition = "product_id = " . $id_product;
        $model = self::model('ProductModel');
        $result = $model->deleteProduct($condition);
        if ($result) {
            header("Location: http://localhost/Black-Aries-Project/AdminController/productManagement?position=1");
            echo "Success";
        } else {
            echo "Error";
        }
    }

    function getNameImage()
    {
        $time = (new DateTime())->format('YmdHis');
        $ramdumNumber = "e" . mt_rand(1, 1000);
        return $time . $ramdumNumber;
    }
    function infomationProduct(){
        $productName = $_POST['product_name'] ?? null;
        $productDescription = $_POST['product_description'] ?? null;
        $productCategory = $_POST['product_category'] ?? null;
        $productStatus = $_POST['product_status'] ?? null;
        $productDiscount = $_POST['product_discount'] ?? null;
        $colors = $_POST['color'] ?? [];
        $quantities = $_POST['quantity'] ?? [];
        $prices = $_POST['price'] ?? [];
        $defaults = $_POST['default'] ?? [];
        $images = $_FILES['image'] ?? [];

        $data = [
            'product_name' => $productName,
            'description' => $productDescription,
            'category_id' => $productCategory,
            'status' => $productStatus,
            'discount' => $productDiscount,
            'colors'=> $colors,
            'quantities'=> $quantities,
            'prices'=> $prices,
            'defaults'=> $defaults,
            'images'=> $images
        ];
        return $data;
    }
}
