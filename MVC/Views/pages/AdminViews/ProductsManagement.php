<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="http://localhost/Black-Aries-Project/public/css/ProductManagement.css?ver=<?php echo time(); ?>" rel="stylesheet">
    <style>
        html,
        body {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .big-container{
            display:flex;
            width:100%;
            height:100%;
        }

        .main-container {
            flex: 1;
            padding: 15px 21px;
            position: relative;
            overflow-y: auto;
            /* Enable vertical scrolling */
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #527A9A;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            padding: 10px 15px;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 4px;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <?php extract($data); ?>
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
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo $product['product_name']; ?></td>
                            <td><?php echo $product['description']; ?></td>
                            <td><?php echo $product['time_stamp']; ?></td>
                            <td><?php echo $product['category_id']; ?></td>
                            <td><?php echo $product['status']; ?></td>
                            <td><?php echo $product['discount']; ?>%</td>
                            <td><?php echo $product['popular']; ?></td>
                            <!-- <td class="td_action">
                                <button onclick="viewDetails(<?php echo $product['product_id']; ?>)" aria-label="View Details">Detail</button>
                                <form action="" method="POST" style="display:none">
                                    <input type="number" name="product_id" readonly value="<?php echo $product['product_id']; ?>">
                                    <button type="submit" class="delete_button" aria-label="Delete Product">Delete</button>
                                </form>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

</html>