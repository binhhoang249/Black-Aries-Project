<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        .container {
            width: 100%;
            max-width: 1450px;
            /* Điều chỉnh chiều rộng tối đa */
            min-height: auto;
            /* Không cần chiều cao tối thiểu */
        }

        .card-body .mt-auto {
            margin-top: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            /* Cho phép các thẻ card xuống dòng */
            justify-content: space-evenly;
            /* Căn giữa các thẻ card */
        }

        #container .col-6 {
            flex: 0 0 270px;
            /* Chiều rộng tối thiểu của mỗi thẻ card */
            margin: 10px;
        }

        /* Sửa kích thước card cho sản phẩm */
        .card-product {
            border: 1px solid #ddd;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 440px;
            /* Thay đổi chiều cao của thẻ sản phẩm */
            width: 328px;
        }

        .card-product:hover {
            transform: scale(1.05);
        }

        .card-image {
            height: 270px;
            width: 100%;
        }

        .card-image img {
            width: 100%;
            /* Giữ hình ảnh rộng 100% của card */
            height: 100%;
            /* Nếu không có ảnh, sẽ có một chiều cao mặc định */
            object-fit: cover;
            /* Cắt và giữ tỷ lệ của hình ảnh */
            mix-blend-mode: multiply;
        }

        .card-product .card-body {
            padding-top: 10px;
            /* Reduced top padding for the card body */
        }

        .card-product .card-title {
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 5px;
            /* Reduced margin-bottom to bring price closer */
        }

        .card-product .card-text {
            font-size: 15px;
            color: #a72828;
            margin-top: 0px;
            /* Reduced margin-top to bring price closer to title */
        }


        /* Style cho nút "Add to Cart" */
        .btn-add-to-cart {
            display: inline-block;
            background-color: #527A9A;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            padding-top: 10px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
            width: 246px;
            height: 39px;
            box-sizing: border-box;
        }

        .btn-add-to-cart:hover {
            background-color: #365b85;
            transform: scale(1.05);
        }

        .btn-add-to-cart:active {
            background-color: #2c4b66;
        }

        .card-product .btn:hover {
            background-color: #8cacc6;
        }

        .back_color {
            background: #F6FBFF;
        }

        a {
            position: relative;
            z-index: 1;
            /* Đảm bảo thẻ <a> hiển thị trên các phần tử khác */
        }
 .filter-form {
    display: flex;
    flex-wrap: wrap; /* Cho phép các phần tử xuống dòng khi không đủ không gian */
    gap: 15px; /* Khoảng cách giữa các phần tử */
    width: 100%;
    max-width: 100%; /* Kích thước tối đa của form */
    padding: 10px;
    background-color: #f8f9fa; /* Màu nền sáng */
    border-radius: 10px; /* Các góc tròn cho form */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho form */
    align-items: center;
}
.filter-form label {
    font-weight: bold;
    font-size: 14px;
    margin-bottom: 5px;
    width: 100px; /* Đặt chiều rộng cho label */
    margin-left: 50px;
}
.filter-form input[type="text"],
.filter-form input[type="number"]{
    width: 250px; /* Chiều rộng của các input */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    margin-bottom: 15px; /* Khoảng cách dưới các input */
    box-sizing: border-box;
}
.filter-form input[type="range"] {
    width: 250px; /* Chiều rộng của các input */
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
    margin-bottom: 4px;

}
.apply-button {
    padding: 10px 20px;
    background-color: rgb(31, 121, 181); /* Màu nền xanh lá */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    width: 120px; /* Nút có chiều rộng cố định */
    box-sizing: border-box;
    transition: background-color 0.3s ease;
}

.apply-button:hover {
    background-color: rgba(28, 98, 183, 0.78); /* Màu xanh đậm khi hover */
}

.apply-button:active {
    background-color: rgb(115, 125, 146); /* Màu xanh đậm hơn khi nhấn */
}

    </style>
</head>
<body>
    <?php
    extract($data);
    include_once 'MVC/Views/components/header.php';
    ?>
    <form action="/Black-Aries-Project/productController/filterProductsByPrice" method="POST" class="filter-form">
    <div class="filter-section">
    <h3><?php echo $data['numResults']; ?> Results</h3>
        <label for="categoryName">Thể loại:</label>
        <input type="text" id="categoryName" name="categoryName" value="<?= isset($categoryName) ? $categoryName : '' ?>" />

        <!-- Thanh trượt cho giá từ -->
        <label for="minPrice">Giá từ: <span id="minPriceValue">$0</span></label>
        <input type="range" id="minPrice" name="minPrice" min="0" max="1000" step="1" value="<?= isset($minPrice) ? $minPrice : 0 ?>" />
        
        <!-- Thanh trượt cho giá đến -->
        <label for="maxPrice">Giá đến: <span id="maxPriceValue">$1000</span></label>
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
</body>
</html>