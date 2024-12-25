<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="styles.css">
    <style>body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}


.order-management {
    padding: 20px;
}

.tabs {
    display: flex; /* Sử dụng Flexbox */
    justify-content: space-between; /* Cách đều các nút */
    width: 100%; /* Chiều rộng 100% */
    background-color: #527A9A;
    box-sizing: border-box; /* Đảm bảo padding không ảnh hưởng đến chiều rộng */
    justify-content: space-around; /* Cách đều các tab */
    align-items: center;
    height: 63px;
}

.tab {
    color: white; /* Màu chữ */
    padding: 10px 20px;
    cursor: pointer;
    text-transform: uppercase;
    transition: color 0.3s ease, background-color 0.3s ease;
    font-size: 15px;

}

.tab:hover {
    color: red; /* Đổi màu chữ khi hover */
    border-radius: 5px; /* Bo góc nhẹ khi hover */
}
/* Tab đang được chọn */
.tab.active {
    color: red; /* Màu chữ khi đang ở tab đó */
    font-weight: bold; /* Làm đậm chữ */
    border-radius: 5px; /* Tạo bo góc */
}



.order-list {
    margin-top: 20px;
}

.order-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    background-color: #ffffff;
    padding: 10px;
    border: 1px solid #ddd;
}

.order-item img {
    width: 100px;
    height: 100px;
    margin-right: 20px;
}

.order-item .order-info h3 {
    margin: 0;
}

.order-price {
    margin-left: auto;
    text-align: right;
}

.cancel-order {
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.total-price {
    margin-top: 20px;
    text-align: right;
    font-weight: bold;
}
</style>
</head>
<body>

    <!-- Order Management -->
    <div class="order-management">
    <div class="tabs">
    <span class="tab active">All</span>
    <span class="tab">Waiting(1)</span>
    <span class="tab">Progress</span>
    <span class="tab">Transport</span>
    <span class="tab">Complete</span>
    <span class="tab">Canceled</span>
</div>
<div class="order-list">
            <?php while($row = $orders->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="order-item">
                    <img src="product.jpg" alt="Product">
                    <div class="order-info">
                        <h3><?php echo $row['product_name']; ?></h3>
                        <p><?php echo $row['category']; ?></p>
                        <p>Quantity: <?php echo $row['quantity']; ?></p>
                    </div>
                    <div class="order-price">
                        <p>$<?php echo $row['price']; ?></p>
                        <?php if ($row['status'] == 'waiting') { ?>
                            <button class="cancel-order">Cancel order</button>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Total Price -->
        <div class="total-price">
            <p>Total: $<?php echo number_format($totalPrice, 2); ?></p>
        </div>
    </div>
<script>
   const tabs = document.querySelectorAll('.tab') 

   tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Xóa class "active" khỏi tất cả các tab
        tabs.forEach(t => t.classList.remove('active'));
        // Thêm class "active" vào tab được chọn
        tab.classList.add('active');
    });
});
   </script>

    

</body>
</html>
