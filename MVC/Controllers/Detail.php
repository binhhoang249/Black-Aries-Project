<?php
class Details extends Controller {
    public function show($id) {
        // Lấy model của Details
        $model = self::model("DetailsModel");

        // Lấy thông tin chi tiết của sản phẩm
        $data['product_details'] = $model->getProductDetails($id);

        // Lấy thông tin giá (price) từ bảng product_color
        $data['product_price'] = $model->getProductPrice($id);

        // Kiểm tra nếu không tìm thấy sản phẩm
        if (empty($data['product_details'])) {
            echo "Product does not exist!";
            return;
        }

        // Trả về View và truyền dữ liệu
        self::view("DetailsPage", $data);
    }
}
?>
