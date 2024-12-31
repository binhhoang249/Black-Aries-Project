<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/Black-Aries-Project/public/css/admin_order_management.css" rel="stylesheet">
    <title>Order Management Admin</title>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1>Order Management</h1>
            <input type="text" placeholder="Search orders...">
        </div>
        <table class="order-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th> Status </th>   
                     <th>Total</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>#". $row['id'] ."</td>";
                        echo "<td>". $row['customer_name'] ."</td>";
                        echo "<td>
                            <div class='status-cell'>
                                <span id='status-text-". $row['id'] ."'>". ucfirst($row['status']) ."</span>
                                <img src='choose.png' alt='Chọn trạng thái' onclick='toggleStatusDropdown(". $row['id'] .")'>
                                <select id='status-options-". $row['id'] ."' class='hidden' onchange='updateStatus(". $row['id'] .", this.value)'>
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
                    echo "<tr><td colspan='6'>No orders found</td></tr>";
                }
                ?>
            </tbody>
     </table>
    </div>
    <script>
    function toggleStatusDropdown(orderId) {
    const dropdown = document.getElementById('status-options-${orderId}');
    const isHidden = dropdown.classList.contains('hidden');
    if (isHidden) {
        dropdown.classList.remove('hidden');
    } else {
        dropdown.classList.add('hidden');
    }
}

function updateStatus(orderId, newStatus) {
    const statusText = document.getElementById('status-text-${orderId}');
    statusText.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);

    const dropdown = document.getElementById('status-options-${orderId}');
    dropdown.classList.add('hidden'); // Hide the dropdown after selecting
}

</script>

</body>
</html>