<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/Black-Aries-Project/public/css/admin_order_management.css" rel="stylesheet">
    <title>Order Management Admin</title>
</head>
<body>
<?php extract($data); ?>
    <div class="big-container">
        <?php include_once __DIR__ . '/../../Components/AdminNavigation.php'; ?>
        <div class="main-content">
            <div class="header">
                <h1>Order Management</h1>
                <form action="/Black-Aries-Project/AdminController/searchOrder" method="POST">
                        <input type="text" name="searchorder" placeholder="Enter name of product!" required>
                        <button type="submit">Run</button>
                    </form>
    </div>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>  <!-- Thêm cột Customer ID -->
                    <th>Customer</th>
                    <th>Status</th>   
                    <th>Total</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php                
                // Kiểm tra nếu có đơn hàng
                if (!empty($data['result'])) {
                    foreach ($data['result'] as $row) {
                        echo "<tr>";
                        echo "<td>#". $row['order_id'] ."</td>";
                        echo "<td>". $row['user_id'] ."</td>"; 
                        echo "<td>". $row['customer_name'] ."</td>";
                        echo "<td>
                            <div class='status-cell'>
                                <span id='status-text-". $row['order_id'] ."'>". ucfirst($row['status']) ."</span>
                                <img src='http://localhost/Black-Aries-Project/public/Icon/chosse.png' alt='Chọn trạng thái' onclick='toggleStatusDropdown(". $row['order_id'] .")'>
                                <select id='status-options-". $row['order_id'] ."' class='hidden' onchange='updateStatus(". $row['order_id'] .", this.value)'>
                                    <option value='processing'>Processing</option>
                                    <option value='completed'>Completed</option>
                                    <option value='cancelled'>Cancelled</option>
                                </select>
                            </div>
                        </td>";
                        echo "<td>$". number_format($row['total'], 2) ."</td>";
                        echo "<td>". $row['order_date'] ."</td>";
                        echo "<td><button class='btn'>Details</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No orders found</td></tr>"; 
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    function toggleStatusDropdown(orderId) {
        const dropdown = document.getElementById('status-options-' + orderId);
        const isHidden = dropdown.classList.contains('hidden');
        if (isHidden) {
            dropdown.classList.remove('hidden');
        } else {
            dropdown.classList.add('hidden');
        }
    }

    function updateStatus(orderId, newStatus) {
        const statusText = document.getElementById('status-text-' + orderId);
        statusText.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);

        const dropdown = document.getElementById('status-options-' + orderId);
        dropdown.classList.add('hidden'); // Hide the dropdown after selecting
    }
    </script>
</body>
</html>
