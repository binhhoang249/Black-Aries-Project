<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link href="http://localhost/Black-Aries-Project/public/css/orderManagement.css" rel="stylesheet">
</head>
<body>
    <?php
    extract($data);
    include_once 'MVC/Views/components/header.php';
    ?>
    <div class="navigation">
        <a href="">Home</a>
        <p class="Incoive">/Invoice</p>
    </div>
    <div class="categories">
        <li class="item">All (<?php echo $orderCounts['All']; ?>)</li>
        <li class="item">Watting (<?php echo $orderCounts['Watting']; ?>)</li>
        <li class="item">Progress (<?php echo $orderCounts['Progress']; ?>)</li>
        <li class="item">Transport (<?php echo $orderCounts['Transport']; ?>)</li>
        <li class="item">Complete (<?php echo $orderCounts['Complete']; ?>)</li>
        <li class="item">Canceled (<?php echo $orderCounts['Canceled']; ?>)</li>
    </div>
    <div class="list-products">
        <img src="" alt="">
        <p class="name_product"></p>
        <p class="category"></p>
        <p class="quanlity"></p>
        <div class="price_and_button">
            <p class="price"></p>
            <button class="button">Cancel order</button>
        </div>
    </div>
</body>
</html>