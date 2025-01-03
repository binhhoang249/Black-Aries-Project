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

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-add {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        .search-box {
            display: flex;
            align-items: center;
        }

        .search-box input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
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

        .btn-action {
            display: flex;
            justify-content: center;
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

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 500px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            margin: 0;
        }

        .modal-close {
            cursor: pointer;
            font-size: 24px;
        }

        .modal-body input,
        .modal-body textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .modal-footer {
            text-align: right;
        }

        .modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 14px;
        }

        .modal-footer button:hover {
            background-color: #218838;
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
                <div class="header-actions">
                    <button class="btn-add" onclick="openAddProductModal()">Add Product</button>
                    <div class="search-box">
                        <input type="text" id="search" placeholder="Search products..." onkeyup="searchProducts()">
                    </div>
                </div>
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
                                <div class="btn-action" style="width: 100px;">
                                    <button class="btn btn-edit" onclick="editProduct(<?php echo $product['product_id']; ?>)">Edit</button>
                                    <button class="btn btn-delete" onclick="deleteProduct(<?php echo $product['product_id']; ?>)">Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- Modal for adding product -->
    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Product</h2>
                <span class="modal-close" onclick="closeAddProductModal()">&times;</span>
            </div>
            <div class="modal-body">
                <input type="text" id="productName" placeholder="Product Name">
                <textarea id="productDescription" placeholder="Product Description"></textarea>
                <input type="text" id="productCategory" placeholder="Category">
                <input type="text" id="productStatus" placeholder="Status">
                <input type="number" id="productDiscount" placeholder="Discount">
                <input type="text" id="productPopular" placeholder="Popular">
            </div>
            <div class="modal-footer">
                <button onclick="saveProduct()">Save</button>
            </div>
        </div>
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

        // Hàm mở modal thêm sản phẩm
        function openAddProductModal() {
            document.getElementById('addProductModal').style.display = 'flex';
        }

        // Hàm đóng modal thêm sản phẩm
        function closeAddProductModal() {
            document.getElementById('addProductModal').style.display = 'none';
        }

        // Hàm lưu sản phẩm mới
        function saveProduct() {
            const productName = document.getElementById('productName').value;
            const productDescription = document.getElementById('productDescription').value;
            const productCategory = document.getElementById('productCategory').value;
            const productStatus = document.getElementById('productStatus').value;
            const productDiscount = document.getElementById('productDiscount').value;
            const productPopular = document.getElementById('productPopular').value;

            // TODO: Gửi dữ liệu sản phẩm mới tới server qua AJAX hoặc form
            alert('Product saved: ' + productName);

            // Đóng modal sau khi lưu
            closeAddProductModal();
        }

        // Hàm tìm kiếm sản phẩm
        function searchProducts() {
            const searchValue = document.getElementById('search').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const productName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                row.style.display = productName.includes(searchValue) ? 'table-row' : 'none';
            });
        }
    </script>
</body>

</html>