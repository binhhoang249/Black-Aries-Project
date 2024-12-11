
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/Black-Aries-Project/public/css/homepage.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="container">
        <!-- category -->
        <div class="container py-4">
                <h3 class="text-center mb-4">Category</h3>
                <!-- Carousel -->
                <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel" >
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active" style="margin:0;">
                            <div class="row slider" >
                                <!--Chứa các thẻ category mà js sẽ thực giện chướng trình để chèn vào -->
                            </div>
                        </div>
                    </div>
                    <!-- Thêm nút điều hướng -->
                    <button style="width:30px;" class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev" onclick="prevSlide()">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button style="width:30px;"  class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next" onclick=" nextSlide()">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- khung của hiện sản phẩm theo loại-->
        <div class="container my-5" class="productFCategory">
            <h2 class="text-center mb-4">Product </h2>
        <!-- Nơi sẽ lưu các product theo loại -->
            <div class="row" id="product_category">
                <div class="col-md-3">
                    <div class="card-product text-center p-3 shadow-sm">
                        <img src="img/product4.jpg" class="card-img-top" alt="product4">
                        <div class="card-body">
                            <h5 class="card-title">Sản phẩm 4</h5>
                            <p class="card-text">$250</p>
                            <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->

        <!-- Popular Products -->
        <div class="container my-5">
            <h2 class="text-center mb-4">Popular Product</h2>
            <div class="row">
                <?php
                if ($popularProducts->num_rows > 0) {
                    while ($row = $popularProducts->fetch_assoc()) {
                        echo '
                        <div class="col-md-3">
                            <div class="card-product text-center p-3 shadow-sm">
                                <img src="' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row["name"] . '</h5>
                                    <p class="card-text">$' . $row["price"] . '</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>Không có sản phẩm nào!</p>";
                }
                ?>
            </div>
        </div>

        <!-- Latest Products -->
        <div class="container my-5">
            <h2 class="text-center mb-4">Latest Product</h2>
            <div class="row">
                <?php
                if ($latestProducts->num_rows > 0) {
                    while ($row = $latestProducts->fetch_assoc()) {
                        echo '
                        <div class="col-md-3">
                            <div class="card-product text-center p-3 shadow-sm">
                                <img src="' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row["name"] . '</h5>
                                    <p class="card-text">$' . $row["price"] . '</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>Không có sản phẩm nào!</p>";
                }
                ?>
            </div>
        </div>

        <!-- All Products -->
        <div class="container my-5">
            <h2 class="text-center mb-4">All Product</h2>
            <div class="row">
                <?php
                if ($allProducts->num_rows > 0) {
                    while ($row = $allProducts->fetch_assoc()) {
                        echo '
                        <div class="col-md-3">
                            <div class="card-product text-center p-3 shadow-sm">
                                <img src="' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row["name"] . '</h5>
                                    <p class="card-text">$' . $row["price"] . '</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>Không có sản phẩm nào!</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="http://localhost/Black-Aries-Project/public/js/homepage.js"></script>
</body>
</html>
