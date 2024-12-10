<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            margin-left:0px;
            margin-right:10px;

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
            flex: 0 0 300px; /* Chiều rộng tối thiểu của mỗi thẻ card */
            margin: 10px;
        }

        /* Sửa kích thước card cho sản phẩm */
        .card-product {
            border: 1px solid #ddd;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 440px; /* Thay đổi chiều cao của thẻ sản phẩm */
            width: 308px;
        }

        .card-product:hover {
            transform: scale(1.05);
        }

        .card-product img {
            width: 100%; /* Giữ hình ảnh rộng 100% của card */
            min-height: 270px; /* Nếu không có ảnh, sẽ có một chiều cao mặc định */
            object-fit: cover; /* Cắt và giữ tỷ lệ của hình ảnh */
        }

        .card-product .card-body {
            padding-top: 20px;
        }

        .card-product .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-product .card-text {
            font-size: 16px;
            color: #28a745;
        }

        .card-product .btn {
            background-color: #007bff;
            color: #fff;
            margin-top: 0px;
            border-radius: 5px;
        }

        .card-product .btn:hover {
            background-color: #0056b3;
        }
        .banner .img-fluid{
            width: 1400px;
            object-fit: cover;
            margin-left:140px;
            
        }

        .banner {
            position: relative;
            width:83%;
            margin-left:130px;
            height: 400px; /* Bạn có thể điều chỉnh chiều cao tùy theo nhu cầu */
            background-image: url('../images/banner.png'); /* Đường dẫn đến hình ảnh nền */
            background-size: cover; /* Đảm bảo hình ảnh phủ đầy banner */
            background-position: center; /* Căn giữa hình ảnh trong banner */
            display: flex;
            align-items: center; /* Căn giữa banner dọc */
            text-align: center;
            color: black; /* Màu chữ */
        }

        .banner-content {
            max-width: 800px; /* Đặt chiều rộng tối đa cho nội dung bên trong banner */
            padding: 20px; /* Đệm cho nội dung */
        }

        .banner h1 {
            font-size: 26px; /* Kích thước chữ tiêu đề */
            margin-bottom: 10px;
            margin-left:30px;
        }

        .banner p {
            font-size: 18px; /* Kích thước chữ mô tả */
        }
</style>
</head>
  <body>
  <div id="container">
        <div class="container py-4">
            <h3 class="text-center mb-4">Category</h3>
            <!-- Carousel -->
            <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- Chair -->
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 18L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5 10V5C5 3.89543 5.89543 3 7 3L17 3C18.1046 3 19 3.89543 19 5V10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.5 10C18.1193 10 17 11.1193 17 12.5V14H7V12.5C7 11.1193 5.88071 10 4.5 10C3.11929 10 2 11.1193 2 12.5C2 13.7095 2.85888 14.7184 4 14.95V18H20V14.95C21.1411 14.7184 22 13.7095 22 12.5C22 11.1193 20.8807 10 19.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 18L20 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Chair</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Sofa -->
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 16L2 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4 9V7C4 5.89543 4.89543 5 6 5L18 5C19.1046 5 20 5.89543 20 7V9" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 9C18.8954 9 18 9.89543 18 11V13H6V11C6 9.89543 5.10457 9 4 9C2.89543 9 2 9.89543 2 11V17H22V11C22 9.89543 21.1046 9 20 9Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M22 16L22 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Sofa</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 18L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5 10V5C5 3.89543 5.89543 3 7 3L17 3C18.1046 3 19 3.89543 19 5V10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.5 10C18.1193 10 17 11.1193 17 12.5V14H7V12.5C7 11.1193 5.88071 10 4.5 10C3.11929 10 2 11.1193 2 12.5C2 13.7095 2.85888 14.7184 4 14.95V18H20V14.95C21.1411 14.7184 22 13.7095 22 12.5C22 11.1193 20.8807 10 19.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 18L20 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Chair</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 18L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5 10V5C5 3.89543 5.89543 3 7 3L17 3C18.1046 3 19 3.89543 19 5V10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.5 10C18.1193 10 17 11.1193 17 12.5V14H7V12.5C7 11.1193 5.88071 10 4.5 10C3.11929 10 2 11.1193 2 12.5C2 13.7095 2.85888 14.7184 4 14.95V18H20V14.95C21.1411 14.7184 22 13.7095 22 12.5C22 11.1193 20.8807 10 19.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 18L20 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Chair</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row">
                            <!-- Table -->
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 16L2 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4 9V7C4 5.89543 4.89543 5 6 5L18 5C19.1046 5 20 5.89543 20 7V9" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 9C18.8954 9 18 9.89543 18 11V13H6V11C6 9.89543 5.10457 9 4 9C2.89543 9 2 9.89543 2 11V17H22V11C22 9.89543 21.1046 9 20 9Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M22 16L22 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Table</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 18L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5 10V5C5 3.89543 5.89543 3 7 3L17 3C18.1046 3 19 3.89543 19 5V10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.5 10C18.1193 10 17 11.1193 17 12.5V14H7V12.5C7 11.1193 5.88071 10 4.5 10C3.11929 10 2 11.1193 2 12.5C2 13.7095 2.85888 14.7184 4 14.95V18H20V14.95C21.1411 14.7184 22 13.7095 22 12.5C22 11.1193 20.8807 10 19.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 18L20 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Chair</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 18L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5 10V5C5 3.89543 5.89543 3 7 3L17 3C18.1046 3 19 3.89543 19 5V10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.5 10C18.1193 10 17 11.1193 17 12.5V14H7V12.5C7 11.1193 5.88071 10 4.5 10C3.11929 10 2 11.1193 2 12.5C2 13.7095 2.85888 14.7184 4 14.95V18H20V14.95C21.1411 14.7184 22 13.7095 22 12.5C22 11.1193 20.8807 10 19.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 18L20 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Chair</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class="card-category text-center p-3 shadow-sm">
                                    <div class="card-body">
                                        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 18L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5 10V5C5 3.89543 5.89543 3 7 3L17 3C18.1046 3 19 3.89543 19 5V10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.5 10C18.1193 10 17 11.1193 17 12.5V14H7V12.5C7 11.1193 5.88071 10 4.5 10C3.11929 10 2 11.1193 2 12.5C2 13.7095 2.85888 14.7184 4 14.95V18H20V14.95C21.1411 14.7184 22 13.7095 22 12.5C22 11.1193 20.8807 10 19.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20 18L20 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <h5 class="mt-3">Chair</h5>
                                        <p class="text-muted">200 Item Available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thêm nút điều hướng -->
                <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

  <div class="container my-5">
        <h2 class="text-center mb-4"> Popular Product </h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="../images/product1.png" class="card-img-top" alt="product1">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 1</h5>
                        <p class="card-text">$100</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product2.jpg" class="card-img-top" alt="product2">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 2</h5>
                        <p class="card-text">$150</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product3.jpg" class="card-img-top" alt="product3">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 3</h5>
                        <p class="card-text">$200</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
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

    
  <div class="container my-5">
        <h2 class="text-center mb-4"> Latest Product </h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="../images/product1.png" class="card-img-top" alt="product1">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 1</h5>
                        <p class="card-text">$100</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product2.jpg" class="card-img-top" alt="product2">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 2</h5>
                        <p class="card-text">$150</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product3.jpg" class="card-img-top" alt="product3">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 3</h5>
                        <p class="card-text">$200</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
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
    <div class="banner">
        <div class="banner-content">
            <h1>Chào mừng đến với cửa hàng của chúng tôi!</h1>
            <p>Khám phá những sản phẩm tuyệt vời với giá hấp dẫn!</p>
        </div>
    </div>
    <div class="container my-5">
        <h2 class="text-center mb-4"> All Product </h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="../images/product1.png" class="card-img-top" alt="product1">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 1</h5>
                        <p class="card-text">$100</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product2.jpg" class="card-img-top" alt="product2">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 2</h5>
                        <p class="card-text">$150</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product3.jpg" class="card-img-top" alt="product3">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 3</h5>
                        <p class="card-text">$200</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
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

    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="../images/product1.png" class="card-img-top" alt="product1">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 1</h5>
                        <p class="card-text">$100</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product2.jpg" class="card-img-top" alt="product2">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 2</h5>
                        <p class="card-text">$150</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-product text-center p-3 shadow-sm">
                    <img src="img/product3.jpg" class="card-img-top" alt="product3">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 3</h5>
                        <p class="card-text">$200</p>
                        <a href="#" class="btn btn-primary">Thêm vào giỏ</a>
                    </div>
                </div>
            </div>
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
 </div>
</body>
</html>
