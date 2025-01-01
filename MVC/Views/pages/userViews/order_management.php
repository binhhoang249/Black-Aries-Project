<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link href="http://localhost/Black-Aries-Project/public/css/orderManagement.css" rel="stylesheet">
    <style>
        .order-section {
            display: none;
        }
        .order-section.active {
            display: block;
        }
        .button.disabled {
            background-color: #B0B0B0;
            cursor: not-allowed;
        }
    </style>
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
        <li class="item" onclick="showOrders('All')">All (<?php echo $orderCounts['All']; ?>)</li>
        <li class="item" onclick="showOrders('Watting')">Watting (<?php echo $orderCounts['Watting']; ?>)</li>
        <li class="item" onclick="showOrders('Progress')">Progress (<?php echo $orderCounts['Progress']; ?>)</li>
        <li class="item" onclick="showOrders('Transport')">Transport (<?php echo $orderCounts['Transport']; ?>)</li>
        <li class="item" onclick="showOrders('Complete')">Complete (<?php echo $orderCounts['Complete']; ?>)</li>
        <li class="item" onclick="showOrders('Canceled')">Canceled (<?php echo $orderCounts['Canceled']; ?>)</li>
    </div>

    <div class="order-section" id="All">
        <h2>All Orders</h2>
        <?php foreach ($orders as $status => $orderList): ?>
            <?php foreach ($orderList as $order): ?>
                <div class="list-products">
                    <img src="http://localhost/Black-Aries-Project/public/images/products/<?php echo $order['image']; ?>" alt="Product Image">
                    <p class="name_product"><?php echo $order['product_name']; ?></p>
                    <p class="quanlity">Quantity: <?php echo $order['quantity']; ?></p>
                    <div class="price_and_button">
                        <p class="price">$<?php echo number_format($order['total'], 2); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>

    <?php foreach ($orders as $status => $orderList): ?>
        <div class="order-section" id="<?php echo $status; ?>">
            <h2><?php echo ucfirst($status); ?> Orders</h2>
            <?php foreach ($orderList as $order): ?>
                <div class="list-products">
                    <img src="http://localhost/Black-Aries-Project/public/images/products/<?php echo $order['image']; ?>" alt="Product Image">
                    <p class="name_product"><?php echo $order['product_name']; ?></p>
                    <p class="quanlity">Quantity: <?php echo $order['quantity']; ?></p>
                    <div class="price_and_button">
                        <p class="price">$<?php echo number_format($order['total'], 2); ?></p>
                        <?php if ($status === 'Watting'): ?>
                            <?php if (isset($order['order_id'])): ?>
                                <form action="http://localhost/Black-Aries-Project/OrderController/cancelOrder" method="POST">
                                    <input type="number" name="order_id" value="<?php echo $order['order_id']; ?>" hidden>
                                    <button type="submit" class="button">Cancel order</button>
                                </form>
                            <?php else: ?>
                                <button class="button disabled" disabled>No Order ID</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <button class="button disabled" disabled>Cancel order</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <script>
        function showOrders(status) {
            var sections = document.querySelectorAll('.order-section');
            sections.forEach(function(section) {
                section.classList.remove('active');
            });
            document.getElementById(status).classList.add('active');
        }

        // Hiển thị tất cả các đơn hàng khi trang được tải
        showOrders('All');
    </script>
</body>
</html>
