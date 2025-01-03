<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
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

        .big-container {
            display: flex;
            width: 100%;
            height: 100%;
        }

        .main-container {
            flex: 1;
            padding: 15px 21px;
            position: relative;
            overflow-y: auto;
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

        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .btn-pagination {
            padding: 8px 12px;
            margin: 0 5px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-pagination:hover {
            background-color: #0056b3;
        }

        .btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #ffc107;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
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
                        <th scope="col">Actions</th>
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
                            <td>
                                <button class="btn btn-edit" onclick="editProduct(<?php echo $product['product_id']; ?>)">Edit</button>
                                <button class="btn btn-delete" onclick="deleteProduct(<?php echo $product['product_id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tbody tr');
            const rowsPerPage = 10;
            const totalPages = Math.ceil(rows.length / rowsPerPage);

            // Tạo các nút phân trang
            const paginationContainer = document.createElement('div');
            paginationContainer.className = 'pagination';
            document.querySelector('.main-container').appendChild(paginationContainer);

            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.textContent = i;
                btn.className = 'btn-pagination';
                btn.setAttribute('data-page', i);
                paginationContainer.appendChild(btn);
            }

            // Hàm hiển thị trang tương ứng
            function showPage(page) {
                rows.forEach((row, index) => {
                    row.style.display =
                        index >= (page - 1) * rowsPerPage && index < page * rowsPerPage ? 'table-row' : 'none';
                });
            }

            // Hiển thị trang đầu tiên mặc định
            showPage(1);

            // Xử lý khi nhấn vào nút phân trang
            document.querySelectorAll('.btn-pagination').forEach(button => {
                button.addEventListener('click', function() {
                    const page = parseInt(this.getAttribute('data-page'));
                    showPage(page);
                });
            });
        });

        // Hàm chỉnh sửa sản phẩm
        function editProduct(productId) {
            alert('Edit product with ID: ' + productId);
            // TODO: Redirect or open edit form
        }

        // Hàm xóa sản phẩm
        function deleteProduct(productId) {
            if (confirm('Are you sure you want to delete product with ID: ' + productId + '?')) {
                // TODO: Gửi yêu cầu xóa sản phẩm tới server qua AJAX hoặc form
                alert('Product with ID ' + productId + ' has been deleted.');
            }
        }
    </script>
</body>

</html>