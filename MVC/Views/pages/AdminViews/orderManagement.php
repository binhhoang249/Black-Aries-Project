<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/Black-Aries-Project/public/css/admin_order_management.css" rel="stylesheet">
    <title>Order Management Admin</title>
</head>
<body>
    <?php
    // Kiểm tra xem biến $data có tồn tại và là mảng không
    if (isset($data) && is_array($data)) {
        extract($data); // Trích xuất các biến từ mảng $data
    } else {
        $data = []; // Nếu không, gán $data là một mảng rỗng
    }
    ?>
    <div class="big-container">
        <?php include_once __DIR__ . '/../../Components/AdminNavigation.php'; ?>
        <div class="main-content">
            <div class="header">
                <h1>Order Management</h1>
                <form action="/Black-Aries-Project/AdminController/searchOrder" method="POST">
                    <input type="text" name="searchorder" placeholder="Enter name of order!" required>
                    <button type="submit">Run</button>
                </form>
            </div>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
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
                    if (!empty($data['result']) && is_array($data['result'])) {
                        foreach ($data['result'] as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['order_id'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($row['user_id'] ?? 'N/A') . "</td>";
                            echo "<td>" . htmlspecialchars($row['customer_name'] ?? 'N/A') . "</td>";
                            echo "<td>
                            <div class='status-cell'>
                                <span id='status-text-" . htmlspecialchars($row['order_id'] ?? '') . "'>" . ucfirst(htmlspecialchars($row['status'] ?? 'N/A')) . "</span>
                                <img src='http://localhost/Black-Aries-Project/public/Icon/chosse.png' alt='Chọn trạng thái' onclick='toggleStatusDropdown(" . htmlspecialchars($row['order_id'] ?? '') . ")'>
                                
                                <!-- Form ẩn chứa Dropdown -->
                                <form action='/Black-Aries-Project/AdminController/updateStatusAction' method='POST' id='status-form-" . htmlspecialchars($row['order_id'] ?? '') . "' style='display:none;'>
                                    <input type='hidden' name='order_id' value='" . htmlspecialchars($row['order_id'] ?? '') . "'>
                                    <select name='status' onchange='this.form.submit()'>
                                        <option value='1' " . ($row['status'] == '1' ? 'selected' : '') . ">1</option>
                                        <option value='2' " . ($row['status'] == '2' ? 'selected' : '') . ">2</option>
                                        <option value='3' " . ($row['status'] == '3' ? 'selected' : '') . ">3</option>
                                    </select>
                                </form>
                            </div>
                        </td>";
                    
                            echo "<td>$" . number_format((float)($row['total'] ?? 0), 2) . "</td>";
                            echo "<td>" . htmlspecialchars($row['order_date'] ?? 'N/A') . "</td>";
                            echo "<td>
                                <a href='/Black-Aries-Project/AdminController/Order_details/" . htmlspecialchars($row['order_id'] ?? '') . "' class='btn'>Details</a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No orders found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
            </div>
            <script>
            function toggleStatusDropdown(orderId) {
    var form = document.getElementById('status-form-' + orderId);
    
    // Kiểm tra trạng thái hiển thị của form dropdown
    if (form.style.display === 'none') {
        form.style.display = 'block';  // Hiển thị dropdown
    } else {
        form.style.display = 'none';   // Ẩn dropdown
    }
}
</script>


