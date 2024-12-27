<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
    .container {
        width: 100%;
        max-width: 1450px;  /* Điều chỉnh chiều rộng tối đa */
        min-height: auto; /* Không cần chiều cao tối thiểu */
    }

    .card-category {
        border: none;
        border-radius: 10px;
        height: 150px;
        margin: 10px;
        margin-left: 0px;
        margin-right: 10px;
    }

    .card-category:hover {
        background-color: #f0f8ff;
        cursor: pointer;
    }

    .card-category.active {
        background-color: #365b85;
        color: #fff;
    }

    .card-category .bi {
        color: #365b85;
    }

    .card-category.active .bi {
        color: #fff;
    }

    .card-body .mt-auto {
        margin-top: auto;
    }

    .row {
        display: flex;
        flex-wrap: nowrap; /* Không cho các thẻ card xuống dòng */
        justify-content: space-evenly; /* Căn giữa các thẻ card */
    }

    #container .col-6 {
        flex: 0 0 270px; /* Chiều rộng tối thiểu của mỗi thẻ card */
        margin: 10px;
    }

    /* Sửa kích thước card cho sản phẩm */
    .card-product {
        border: 1px solid #ddd;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 440px; /* Thay đổi chiều cao của thẻ sản phẩm */
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
        width: 100%; /* Giữ hình ảnh rộng 100% của card */
        height: 100%; /* Nếu không có ảnh, sẽ có một chiều cao mặc định */
        object-fit: cover; /* Cắt và giữ tỷ lệ của hình ảnh */
        mix-blend-mode: multiply;
    }

    .card-product .card-body {
    padding-top: 10px; /* Reduced top padding for the card body */
}

.card-product .card-title {
    font-size: 23px;
    font-weight: bold;
    margin-bottom: 5px; /* Reduced margin-bottom to bring price closer */
}

.card-product .card-text {
    font-size: 15px;
    color: #a72828;
    margin-top: 0px; /* Reduced margin-top to bring price closer to title */
}


/* Style cho nút "Add to Cart" */
.btn-add-to-cart {
    display: inline-block;
    background-color: #527A9A;
    color: #fff;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    padding-top:10px;
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

   

 .banner h1 {
        font-size: 26px; /* Kích thước chữ tiêu đề */
        margin-bottom: 10px;
        margin-left: 30px;
    }

    .banner p {
        font-size: 18px; /* Kích thước chữ mô tả */
    }

    .carousel-control-next-icon {
        background-color: gray !important; /* Màu đen cho mũi tên */
    }

    .carousel-control-prev-icon {
        background-color: gray !important; /* Màu đen cho mũi tên */
    }

    .itemal {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 20%;
    }

    .back_color {
        background: #F6FBFF;
    }

    a {
        position: relative;
        z-index: 1; /* Đảm bảo thẻ <a> hiển thị trên các phần tử khác */
    }
    </style>
</head>
<body>
<?php
    extract($data);
    include_once 'MVC/Views/components/header.php';
    ?>
    <div class="container my-5">        
        <?php if (!empty($products)): ?>
            <div class="row">
                <?php 
                // Lấy sản phẩm cuối cùng
                $lastProduct = end($products);
                ?>
                <div class="col-md-3">
                    <div class="card-product text-center p-3 shadow-sm">
                        <div class="card-image">
                            <img src="http://localhost/Black-Aries-Project/public/images/products/<?php echo ($lastProduct['image']); ?>" 
                                 class="card-img-top" 
                                 alt="<?php echo ($lastProduct['product_name']); ?>">
                        </div>
                        <div class="card-body">
                            <a href="http://localhost/Black-Aries-Project/productController/detail/<?php echo ($lastProduct['product_id']); ?>">
                                <h5 class="card-title"><?php echo ($lastProduct['product_name']); ?></h5>
                            </a>
                            <p class="card-text">$<?php echo ($lastProduct['price']); ?></p>
                            <a href="#" class="btn-add-to-cart">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Nếu không có sản phẩm, hiển thị thông báo -->
            <div class="alert alert-warning text-center">
                <p><?php echo isset($message) ? htmlspecialchars($message) : 'No products found.'; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
