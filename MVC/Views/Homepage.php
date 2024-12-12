<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/homepage.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> 
</head>
<body>
    <?php extract($data);
    include_once 'MVC/Views/header.php';
     ?>
    <div style="width:100%;height:696px;position:relative">
        <img style="width:100%;height:100%" src="public/images/Rectangle 12.png" alt="Banner">
        <p style="position:absolute;top:50%;left:50%;font-size:64px;color:white;transform:translate(-50%, -50%);width:864px;">Welcome to my Black Aries</p>
    </div>
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
        <!-- khung của hiện sản phẩm theo loại-->
        <div class="container my-5 productFCategory">
            <h2 class="text-center mb-4">Product </h2>
        <!-- Nơi sẽ lưu các product theo loại -->
            <div class="row" id="product_category">
            </div>
        </div>
        <!-- -->

        <!-- Popular Products -->
        <div class="container my-5">
            <h2 class="text-center mb-4">Popular Product</h2>
            <div class="row">
                <?php
                if (!empty($product_popular)) {
                    $n=1;
                    foreach($product_popular as $row) {
                        $p_color=[];
                        foreach($product_color as $value2){
                            if ($row['product_id']==$value2['product_id']){
                                $p_color=$value2;
                            }
                        }
                        echo '
                        <div class="col-md-3">
                            <div class="card-product text-center p-3 shadow-sm">
                                <img src=" '. $p_color['image'] .'" class="card-img-top" alt="' . $row["product_name"] . '">
                                <div class="card-body">
                                    <a href=http://localhost/Black-Aries-Project/Detail/show/' . $row["product_id"] . '><h5 class="card-title">' . $row["product_name"] . '</h5> </a>
                                    <p class="card-text">$' . $p_color['price'] . '</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>';
                        if($n==4){
                            break;
                        }
                        $n++;
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
                if (!empty($product_lates)) {
                    $n=1;
                    foreach($product_lates as $row) {
                        $p_color=[];
                        foreach($product_color as $value2){
                            if ($row['product_id']==$value2['product_id']){
                                $p_color=$value2;
                            }
                        }
                        echo '
                        <div class="col-md-3">
                            <div class="card-product text-center p-3 shadow-sm">
                                <img src=" '. $p_color['image'] .'" class="card-img-top" alt="' . $row["product_name"] . '">
                                <div class="card-body">
                                    <a href=http://localhost/Black-Aries-Project/Detail/show/' . $row["product_id"] . '><h5 class="card-title">' . $row["product_name"] . '</h5> </a>
                                    <p class="card-text">$' . $p_color['price'] . '</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>';
                        if($n==4){
                            break;
                        }
                        $n++;
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
                if (!empty($product)) {
                    $n=1;
                    foreach($product as $row) {
                        $p_color=[];
                        foreach($product_color as $value2){
                            if ($row['product_id']==$value2['product_id']){
                                $p_color=$value2;
                            }
                        }
                        echo '
                        <div class="col-md-3">
                            <div class="card-product text-center p-3 shadow-sm">
                                <img src=" '. $p_color['image'] .'" class="card-img-top" alt="' . $row["product_name"] . '">
                                <div class="card-body">
                                    <a href=http://localhost/Black-Aries-Project/Detail/show/' . $row["product_id"] . '><h5 class="card-title">' . $row["product_name"] . '</h5> </a>
                                    <p class="card-text">$' . $p_color['price'] . '</p>
                                    <a href="#" class="btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>';
                        if($n==4){
                            break;
                        }
                        $n++;
                    }
                } else {
                    echo "<p>Không có sản phẩm nào!</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once 'MVC/Views/footer.php'    ?>
    <script src="http://localhost/Black-Aries-Project/public/js/homepage.js"></script>
</body>
</html>