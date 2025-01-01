
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="http://localhost/Black-Aries-Project/public/css/ProductManagement.css?ver=<?php echo time(); ?>" rel="stylesheet">
    <style>
        
    </style>
</head>

<body>
    <div class="big-container">
        <?php include_once __DIR__ . '/../../Components/AdminNavigation.php'; ?>

        <section class="main-container">
            <header>
                <h1>Product Management</h1>
            </header>

            <table>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Popular</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['description']; ?></td>
                            <td><?php echo $product['timestamp']; ?></td>
                            <td><?php echo $product['category']; ?></td>
                            <td><?php echo $product['status']; ?></td>
                            <td><?php echo $product['discount']; ?>%</td>
                            <td><?php echo $product['popular']; ?></td>
                            <td class="td_action">
                                <button onclick="viewDetails(<?php echo $product['id']; ?>)" aria-label="View Details">Detail</button>
                                <form action="" method="POST" style="display:none">
                                    <input type="number" name="product_id" readonly value="<?php echo $product['id']; ?>">
                                    <button type="submit" class="delete_button" aria-label="Delete Product">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Product Details Form -->
            <form class="form-detail" id="product-detail-form" style="display:none;" onsubmit="return validateForm()">
                <div class="field">
                    <div class="box-image">
                        <img id="f-image" src="" alt="Product Image">
                    </div>
                    <div class="box-info">
                        <p><b>Id:</b> <span id="f-product-id"></span></p>
                        <p><b>Product Name:</b> <span id="f-product-name"></span></p>
                        <p><b>Description:</b> <span id="f-description"></span></p>
                    </div>
                </div>
                <div class="field">
                    <label><b>Discount:</b> <input type="number" id="f-discount" readonly></label>
                </div>
                <div class="field">
                    <label><b>Status:</b> <input type="text" id="f-status" readonly></label>
                </div>