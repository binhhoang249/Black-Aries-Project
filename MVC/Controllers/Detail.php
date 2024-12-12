<?php
class ProductDetailsController {
    private $detailsModel;

    public function __construct() {
        // Khởi tạo model
        $this->detailsModel = new DetailsModel();
    }

    // Hàm để lấy thông tin chi tiết sản phẩm
    public function showProductDetails($id) {
        // Gọi phương thức từ model để lấy chi tiết sản phẩm
        $productDetails = $this->detailsModel->getProductDetails($id);
        $sliderImages = $this->detailsModel->getsliderimages($id);

        // Kiểm tra xem có kết quả không
        if (!empty($productDetails)) {
            // Lấy dữ liệu chi tiết sản phẩm và hình ảnh slider
            $product = $productDetails[0]; // Dữ liệu chỉ có 1 sản phẩm nên lấy phần tử đầu tiên
            $images = array_column($sliderImages, 'image'); // Tạo một mảng chỉ chứa các hình ảnh slider

            include 'views/product_details.php'; 
        } else {
            // Nếu không tìm thấy sản phẩm, bạn có thể thông báo lỗi hoặc chuyển hướng
            echo "Product not found.";
        }
    }
}
?>
