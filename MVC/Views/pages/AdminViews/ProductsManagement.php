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
        }
        .big-container{
            display:flex;
            width:100%;
            min-height:100%;
        }
        .main-container{
            flex:1;
            padding:15px 21px;
            position:relative;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color:#527A9A !important;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 15px;
            margin-right: 5px;
            cursor: pointer;
        }

        .btn-add {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-edit {
            background-color: #ffc107;
            color: white;
            border: none;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border: none;
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
                            <td class="td_action">
                                <button onclick="viewDetails(<?php echo $product['product_id']; ?>)" aria-label="View Details">Detail</button>
                                <form action="" method="POST" style="display:none">
                                    <input type="number" name="product_id" readonly value="<?php echo $product['product_id']; ?>">
                                    <button type="submit" class="delete_button" aria-label="Delete Product">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

</html>