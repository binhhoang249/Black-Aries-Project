
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></head>
<body>
    <div id="container">
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-6 col-md-2">
                    <div class="card-category text-center p-3 shadow-sm">
                        <div class="card-body">
                            <img src="icons/<?php echo $category['icon']; ?>" alt="<?php echo $category['name']; ?>" style="width: 24px; height: 24px;">
                            <h5 class="mt-3"><?php echo $category['name']; ?></h5>
                            <p class="text-muted"><?php echo $category['item_count']; ?> Item Available</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

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
</body>
</html>
