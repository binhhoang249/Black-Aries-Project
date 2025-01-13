<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/Black-Aries-Project/public/css/search_filter.css" rel="stylesheet">
    <title>Search Results</title>
</head>
<body>
    <?php
    extract($data);
    include_once 'MVC/Views/components/header.php';
    ?>
    <form action="/Black-Aries-Project/productController/filterProductsByPrice" method="POST" class="filter-form">
    <div class="filter-section">
    <h3><?php echo isset($data['numResults']) ? $data['numResults'] : 0; ?> Results</h3>
        <label for="categoryName">Category:</label>
        <input type="text" id="categoryName" name="categoryName" value="<?= isset($categoryName) ? $categoryName : '' ?>" />

        <!-- Thanh trượt cho giá từ -->
        <label for="minPrice">Price from: <span id="minPriceValue">$0</span></label>
        <input type="range" id="minPrice" name="minPrice" min="0" max="1000" step="1" value="<?= isset($minPrice) ? $minPrice : 0 ?>" />
        
        <!-- Thanh trượt cho giá đến -->
        <label for="maxPrice">Price to: <span id="maxPriceValue">$1000</span></label>
        <input type="range" id="maxPrice" name="maxPrice" min="0" max="1000" step="1" value="<?= isset($maxPrice) ? $maxPrice : 1000 ?>" />
        
        <!-- Nút Apply -->
        <button type="submit" class="apply-button">Apply</button>
    </div>
</form>
<div class="container my-5">
    <?php if (!empty($data['products'])): ?>
        <div class="row">
            <?php foreach ($data['products'] as $product): ?>
                <div class="col-md-3">
                        <div class="card-product text-center p-3 shadow-sm">
                            <div class="card-image">
                                <img src="http://localhost/Black-Aries-Project/public/images/products/<?php echo ($product['image']); ?>"
                                    class="card-img-top"
                                    alt="<?php echo ($product['product_name']); ?>">
                            </div>
                            <div class="card-body">
                                <a href="http://localhost/Black-Aries-Project/productController/detail/<?php echo ($product['product_id']); ?>">
                                    <h5 class="card-title"><?php echo ($product['product_name']); ?></h5>
                                </a>
                                <p class="card-text">$<?php echo ($product['price']); ?></p>
                                <a href="#" class="btn-add-to-cart">Add to cart</a>
                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Nếu không có sản phẩm, hiển thị thông báo -->
        <div class="alert alert-warning text-center">
            <p><?php echo isset($message) ? htmlspecialchars($message) : 'No products found.'; ?></p>
        </div>
    <?php endif; ?>
</div>
<script> 
    // Lấy các phần tử thanh trượt và hiển thị giá trị
    const minPriceSlider = document.getElementById("minPrice");
    const maxPriceSlider = document.getElementById("maxPrice");
    const minPriceValue = document.getElementById("minPriceValue");
    const maxPriceValue = document.getElementById("maxPriceValue");

    // Cập nhật giá trị khi thay đổi thanh trượt
    minPriceSlider.addEventListener("input", function() {
        minPriceValue.textContent = "$" + minPriceSlider.value;
    });

    maxPriceSlider.addEventListener("input", function() {
        maxPriceValue.textContent = "$" + maxPriceSlider.value;
    });

    // Đảm bảo giá trị ban đầu được hiển thị đúng
    minPriceValue.textContent = "$" + minPriceSlider.value;
    maxPriceValue.textContent = "$" + maxPriceSlider.value;
</script>
<?php include_once 'MVC/Views/Components/Footer.php'; ?>
</body>
</html>