<?php
class OrderController extends Controller
{
    private $productModel;

    public function __construct()
    {
        // Tải model productModel
        $this->productModel = self::model("productModel");
    }

    public function orderManagement()
    {
        // Mảng ánh xạ trạng thái
        $statusMap = [
            1 => 'Watting',
            2 => 'Progress',
            3 => 'Transport',
            4 => 'Complete',
            5 => 'Canceled'
        ];

        // Lấy tất cả các đơn hàng từ model
        $orders = $this->productModel->getAllOrdersWithDetails();
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

        // Tính tổng tiền và chuẩn bị chi tiết đơn hàng
        foreach ($orders as $order) {
            $totalPrice += $order['order_price'] * $order['order_quantity'];

            // Chuyển đổi trạng thái từ số sang chuỗi
            $status = $statusMap[$order['status']];

            $orderDetails[$status][] = [
                'product_name' => $order['product_name'],
                'category_name' => $order['category_name'],
                'quantity' => $order['order_quantity'],
                'price' => $order['order_price'],
                'status' => $status,
                'total' => $order['order_price'] * $order['order_quantity'], // Tổng tiền cho sản phẩm
                'product_quantity' => $order['product_quantity'],
                'image' => $order['image'],
                'product_price' => $order['product_price']
            ];

            // Tăng số lượng cho từng trạng thái đơn hàng
            $orderCounts['All']++;
            if (isset($orderCounts[$status])) {
                $orderCounts[$status]++;
            }
        }

        // Chuẩn bị mảng dữ liệu để truyền vào view
        $data = [
            'orders' => $orderDetails,  // Chi tiết đơn hàng
            'totalPrice' => $totalPrice, // Tổng tiền cho tất cả đơn hàng
            'orderCounts' => $orderCounts // Số lượng đơn hàng theo trạng thái
        ];

        // Truyền dữ liệu vào view
        self::view("pages/userViews/order_management", $data);
    }
}
?>