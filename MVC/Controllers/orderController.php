<?php
class OrderController extends Controller {
    private $productModel;

    public function __construct() {
        // Khởi tạo model sử dụng phương thức đúng
        $this->productModel = self::model("productModel"); // Được điều chỉnh để sử dụng phương thức tải model
    }

    public function orderManagement() {
        // Lấy tất cả các đơn hàng từ model
        $orders = $this->productModel->getAllOrders();
        $totalPrice = 0;
        $orderDetails = [];

        // Tính tổng tiền và chuẩn bị chi tiết đơn hàng
        foreach ($orders as $order) {
            $totalPrice += $order['price'] * $order['quantity'];

            $orderDetails[] = [
                'product_name' => $order['product_name'],
                'category_name' => $order['category_name'], 
                'quantity' => $order['quantity'], 
                'price' => $order['price'],
                'status' => $order['status'],
                'total' => $order['price'] * $order['quantity'] // Tổng tiền cho sản phẩm
            ];
        }

        // Chuẩn bị mảng dữ liệu để truyền vào view
        $data = [
            'orders' => $orderDetails,  // Chi tiết đơn hàng
            'totalPrice' => $totalPrice // Tổng tiền cho tất cả đơn hàng
        ];

        // Truyền dữ liệu vào View
        self::view("pages/userViews/order_management.php", $data);
    }
}
?>
