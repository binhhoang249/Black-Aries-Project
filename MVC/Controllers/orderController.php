<?php
class OrderController extends Controller
{
    private $productModel;
    private $model2;

    public function __construct()
    {
        // Tải model productModel và OrderModel
        $this->productModel = self::model("productModel");
        $this->model2 = self::model('OrderModel');
    }

    public function orderManagement()
    {
        // Lấy ID người dùng từ session
        $userId = $_SESSION['userIDB'];

        // Mảng ánh xạ trạng thái
        $statusMap = [
            2 => 'Watting',
            3 => 'Progress',
            4 => 'Transport',
            5 => 'Complete',
            6 => 'Canceled'
        ];

        // Lấy tất cả các đơn hàng của người dùng từ model
        $orders = $this->model2->getAllOrdersWithDetails($userId);

        // Khởi tạo các biến cần thiết
        $totalPrice = 0;
        $orderDetails = [
            'Watting' => [],
            'Progress' => [],
            'Transport' => [],
            'Complete' => [],
            'Canceled' => []
        ];
        $orderCounts = [
            'All' => 0,
            'Watting' => 0,
            'Progress' => 0,
            'Transport' => 0,
            'Complete' => 0,
            'Canceled' => 0
        ];

        if (!empty($orders)) {
            foreach ($orders as $order) {
                $totalPrice += $order['order_price'] * $order['order_quantity'];

                $status = $statusMap[$order['status']] ?? 'Unknown';

                $orderDetails[$status][] = [
                    'order_id' => $order['order_id'],
                    'product_name' => $order['product_name'],
                    'quantity' => $order['order_quantity'],
                    'price' => $order['order_price'],
                    'status' => $status,
                    'total' => $order['order_price'] * $order['order_quantity'],
                    'product_quantity' => $order['product_quantity'],
                    'image' => $order['image'],
                    'product_price' => $order['product_price']
                ];

                $orderCounts['All']++;
                if (isset($orderCounts[$status])) {
                    $orderCounts[$status]++;
                }
            }
        }

        // Chuẩn bị mảng dữ liệu để truyền vào view
        $data = [
            'orders' => $orderDetails,
            'totalPrice' => $totalPrice,
            'orderCounts' => $orderCounts
        ];

        // Truyền dữ liệu vào view
        self::view("pages/userViews/order_management", $data);
    }

    public function cancelOrder()
    {
        echo 123;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['userIDB'];
            $orderId = $_POST['order_id'] ?? null;
            echo $orderId;
            echo $userId;

            // Gọi phương thức cancelOrder từ Model
            $success = $this->model2->cancelOrder($orderId, $userId);

            if ($success) {
                echo 'ok';
            } else {
                echo 'lồn mẹ mày';
            }

            // Chuyển hướng về trang quản lý đơn hàng
            header("Location: http://localhost/Black-Aries-Project/OrderController/orderManagement");
            exit();
        }
    }
    public function cart()
    {
        self::view("Pages/OrderViews/Cart");
    }

    public function checkout()
    {
        $model = self::model("ProductModel");
        $model1 = self::model("UserModel");
        $model2 = self::model('OrderModel');
        $data = [];

        $data['colors'] = $model->getColor();
        $data['products'] = $model->getProducts();
        $data['product_color'] = $model->getProductColorAll();

        $id = $_SESSION['userIDB'] ?? 0;
        $data['user'] = $model1->getUser($id);
        $data['payment'] = $model2->getPayment();

        if (isset($_POST['cart'])) {
            $listP = explode(',', $_POST['valueCart']);
            $listCart = $model2->getCarts($_SESSION['userIDB']);
            $rel = [];
            foreach ($listP as $va) {
                foreach ($listCart as $val) {
                    if ($val['order_id'] == $va) {
                        array_push($rel, $val);
                        break;
                    }
                }
            }
            $data['carts'] = $rel;
            $_SESSION['li_cart'] = $rel;
        } else if (isset($_POST['ve_older'])) {
            $listP = explode(',', $_POST['valueCart']);
            if (count($listP) == 1 && $listP[0] == 0) {
                $product_col = [];
                foreach ($data['product_color'] as $prod) {
                    if ($prod['product_color_id'] == $_SESSION['fakeCart'][0]) {
                        $product_col = $prod;
                        break;
                    }
                }
                $pro_de = null;
                if (!empty($product_col)) {
                    foreach ($data['products'] as $prod) {
                        if ($prod['product_id'] == $product_col['product_id']) {
                            $pro_de = $prod;
                            break;
                        }
                    }
                }
                if (!empty($pro_de)) {
                    $quantityCurrent = $_SESSION['fakeCart'][1];
                    $idproductColorCurrent = $_SESSION['fakeCart'][0];
                    $num = $product_col['quantity'] - $quantityCurrent;
                    $cond = "product_color_id = " . $product_col['product_color_id'];
                    $model->updateProduct_Color(['quantity' => $num], $cond);
                    $day = date("Y-m-d");
                    $idpp = $_POST['pay'] ?? 1;
                    $olPrice = (int)$product_col['price'];
                    $price = ($olPrice - ($olPrice * ($pro_de['discount']) / 100)) * $quantityCurrent;
                    $davi = [
                        "user_id" => $_SESSION['userIDB'],
                        'product_color_id' => $idproductColorCurrent,
                        'price' => $price,
                        'status' => 2,
                        'order_date' => $day,
                        'payment_id' => $idpp,
                        'quantity' => $quantityCurrent
                    ];
                    $model2->addCart($davi);
                }
                $adr = $_POST['address_user'] ?? "";
                $pho = $_POST['phone_user'] ?? "";
                $condi = "user_id = " . $_SESSION['userIDB'];
//đây///////////////////////////////////////////////////////////////////////////////////
                //
                $model1->setUser("Users", ['address' => $adr, 'phone' => $pho], $condi);

                // Chuyển hướng sau khi xử lý xong
                header("Location: http://localhost/Black-Aries-Project/OrderController/orderManagement");
                exit;
            } else {
                $listCart = $model2->getCarts($_SESSION['userIDB']);
                $rel = [];
                foreach ($listP as $va) {
                    foreach ($listCart as $val) {
                        if ($val['order_id'] == $va) {
                            array_push($rel, $val);
                            break;
                        }
                    }
                }
                foreach ($rel as $value) {
                    $product_col = [];
                    foreach ($data['product_color'] as $prod) {
                        if ($prod['product_color_id'] == $value['product_color_id']) {
                            $product_col = $prod;
                            break;
                        }
                    }
                    $pro_de = null;
                    if (!empty($product_col)) {
                        foreach ($data['products'] as $prod) {
                            if ($prod['product_id'] == $product_col['product_id']) {
                                $pro_de = $prod;
                                break;
                            }
                        }
                    }
                    if (!empty($pro_de)) {
                        $num = $product_col['quantity'] - $value['quantity'];
                        $cond = "product_color_id = " . $product_col['product_color_id'];
                        $model->updateProduct_Color(['quantity' => $num], $cond);
                        $day = date("Y-m-d");
                        $idpp = $_POST['pay'] ?? 1;
                        $olPrice = (int)$product_col['price'];
                        $price = ($olPrice - ($olPrice * ($pro_de['discount']) / 100)) * $value['quantity'];
                        $davi = ['price' => $price, 'status' => 2, 'order_date' => $day, 'payment_id' => $idpp];
                        $condi = "user_id = " . $_SESSION['userIDB'] . " and order_id = " . $value['order_id'];
                        $model2->updateCart("Orders", $davi, $condi);
                    }
                }
                $adr = $_POST['address_user'] ?? "";
                $pho = $_POST['phone_user'] ?? "";
                $condi = "user_id = " . $_SESSION['userIDB'];
                //đây /////////////////////////////////////////////////////////////////////////////////

                $model1->setUser("Users", ['address' => $adr, 'phone' => $pho], $condi);

                // Chuyển hướng sau khi xử lý xong
                header("Location: http://localhost/Black-Aries-Project/OrderController/orderManagement");
                exit;
            }
        } else if (isset($_POST['product_but'])) {
            $product_color_id = isset($_POST['productColorId']) ? (int)$_POST['productColorId'] : 0;
            $quantityProduct = (int)$_POST['product_quantity'];
            $data['carts'] = [['order_id' => 0, 'user_id' => $_SESSION['userIDB'], 'product_color_id' => $product_color_id, 'quantity' => $quantityProduct]];
            $_SESSION['fakeCart'] = [$product_color_id, $quantityProduct];
        } else {
            $data['carts'] = $_SESSION['li_cart'] ?? [];
        }

        // Hiển thị trang Checkout
        self::view("Pages/OrderViews/Checkout", $data);
    }
}
