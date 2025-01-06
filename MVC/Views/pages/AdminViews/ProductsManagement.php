<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="http://localhost/Black-Aries-Project/public/css/ProductsManagement.css?ver=<?php echo time(); ?>" rel="stylesheet">
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
                        <th scope="col">Timestamp</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Color</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Default</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo $product['product_name']; ?></td>
                            <td><?php echo $product['time_stamp']; ?></td>
                            <td><?php echo $product['category_id']; ?></td>
                            <td><?php echo $product['status']; ?></td>
                            <td><?php echo $product['discount']; ?>%</td>
                            <td><?php echo $product['color_name']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['defaultal']; ?></td>
                            <td><img src="http://localhost/Black-Aries-Project/public/images/products/<?php echo $product['image']; ?>" alt="Product Image" width="50"></td>
                            <td>
                                <div class="btn-action">
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

            // Thêm phần tử hiển thị số trang hiện tại
            const currentPageDisplay = document.createElement('div');
            currentPageDisplay.className = 'current-page-display';

            // Hàm hiển thị trang tương ứng
            function showPage(page) {
                rows.forEach((row, index) => {
                    row.style.display = index >= (page - 1) * rowsPerPage && index < page * rowsPerPage ? 'table-row' : 'none';
                });
                // Cập nhật số trang hiện tại
                currentPageDisplay.textContent = 'Current Page: ' + page;

                // Cập nhật nút phân trang hiện tại
                document.querySelectorAll('.btn-pagination').forEach(button => {
                    button.classList.remove('active');
                });
                document.querySelector(`.btn-pagination[data-page="${page}"]`).classList.add('active');
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
                const productId = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                row.style.display = productName.includes(searchValue) || productId.includes(searchValue) ? 'table-row' : 'none';
            });
        }
    </script>
</body>

</html>