<?php
class ProductController extends Controller
{
    public function index(){
        $model = self::model("productModel");
        $query="";
        $results = $model->searchProductsByCategoryName($query); 
        $data['products'] = $results;  
        $data['numResults']= count($data['products']);
        self::view("pages/productViews/product", $data);
    }
    public function detail($id)
    {
        // Lấy model của Details
        $idi = (int)$id;
        $model = self::model("productModel");
        $data['product'] = $model->getProduct($idi);
        $data['product_color'] = $model->getProduct_color($idi);
        $liProduct = $data['product_color'];
        for ($j = 0; $j < count($liProduct) - 1; $j++) {
            for ($i = 0; $i < count($liProduct) - 1 - $j; $i++) {
                if ($liProduct[$i]['defaultal'] < $liProduct[$i + 1]['defaultal']) {
                    $temp = $liProduct[$i];
                    $liProduct[$i] = $liProduct[$i + 1];
                    $liProduct[$i + 1] = $temp;
                }
            }
        }
        $data['color'] = $model->getColor();
        $data['product_color'] = $liProduct;
        // Trả về View và truyền dữ liệu
        self::view("Pages/ProductViews/Detail", $data);
    }
    public function search()
    {
        if (isset($_POST['categoryName']) && !empty(trim($_POST['categoryName']))) {
            $query = trim($_POST['categoryName']);

            // Tạo model và tìm kiếm sản phẩm
            $model = self::model("productModel");
            $results = $model->searchProductsByCategoryName($query);  // Gọi phương thức tìm kiếm

            // Kiểm tra nếu có kết quả tìm kiếm
            if ($results && !empty($results)) {
                $data['products'] = $results;  // Gán sản phẩm tìm được vào data
                $data['numResults']= count($data['products']);
                $data['categoryName'] = $query;  // Gán truy vấn tìm kiếm vào data
            } else {
                $data['message'] = "No products found matching your search.";  // Nếu không tìm thấy sản phẩm
            }
        } else {
            // Nếu không có query tìm kiếm
            $data['message'] = "Please enter a keyword to search.";  // Yêu cầu người dùng nhập từ khóa
        }

        // Gửi dữ liệu vào view
        self::view("pages/productViews/product", $data);
    }

    public function filterProductsByPrice()
    {
        // Lấy các tham số lọc từ form
        $categoryName = isset($_POST['categoryName']) ? $_POST['categoryName'] : '';
        $minPrice = isset($_POST['minPrice']) ? (int)$_POST['minPrice'] : 0;
        $maxPrice = isset($_POST['maxPrice']) ? (int)$_POST['maxPrice'] : 0;

        // Gọi phương thức model để tìm kiếm sản phẩm với các tiêu chí lọc
        $model = $this->model("productModel");
        $filteredProducts = $model->searchProducts($categoryName, $minPrice, $maxPrice);
        $numResults = count($filteredProducts);  // Đếm số lượng sản phẩm

        // Truyền kết quả cho view
        $data['numResults'] = $numResults;
        $data['products'] = $filteredProducts;
        $data['categoryName'] = $categoryName;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;

        // Hiển thị kết quả lọc
        $this->view("pages/productViews/product", $data);
    }
}
