<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .receiver-info {
            background-color: white;
            color: black;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        .header {
            background-color: #527A9A;
            color: white;
            padding: 10px;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-table th, .order-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .order-table th {
            background-color: #527A9A;
            color: white;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #527A9A;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #285a92;
        }

        .product-image {
            max-width: 80px;
            max-height: 80px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if (!empty($data['result'])): ?>
        <!-- Receiver Information -->
        <div class="receiver-info">
            <div class="header">
                <h3>Receiver Information</h3>
            </div>
            <p><strong>Recipient Name:</strong> <?= htmlspecialchars($data['result'][0]['customer_name'] ?? 'No name provided') ?></p>
            <p><strong>Phone Number:</strong> <?= htmlspecialchars($data['result'][0]['customer_phone'] ?? 'No phone number provided') ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($data['result'][0]['customer_address'] ?? 'No address provided') ?></p>
        </div>

        <!-- Order Details Table -->
        <table class="order-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['result'] as $order): ?>
                    <tr>
                        <td>
                        <img src="http://localhost/Black-Aries-Project/public/images/products/<?php echo ($order['image']); ?>"
                        alt="<?= htmlspecialchars($order['product_name'] ?? 'Product') ?>" 
                                 class="product-image">
                        </td>
                        <td><?= htmlspecialchars($order['product_name'] ?? 'No product name') ?>
                        <p class="product-category">
                            Category: <?= htmlspecialchars($order['category_name'] ?? 'No category') ?>
                        </p>
                          </td>
                        <td><?= htmlspecialchars($order['order_quantity'] ?? '0') ?></td>
                        <td><?= number_format($order['product_price'] ?? 0, 0, ',', '.') ?> VND</td>
                        <td><?= number_format($order['total'] ?? 0, 0, ',', '.') ?> VND</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No order details found.</p>
    <?php endif; ?>
    <a href="javascript:history.back()" class="back-button">Go back</a>
</div>

</body>
</html>
