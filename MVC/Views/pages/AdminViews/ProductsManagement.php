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

            ...
            <table>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Colors</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
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
                            <td>
                                <select class="colorSelect" data-product-id="<?php echo $product['product_id']; ?>">
                                    <?php foreach ($product['colors'] as $color): ?>
                                        <option value="<?php echo $color['color_id']; ?>" data-quantity="<?php echo $color['quantity']; ?>" data-price="<?php echo $color['price']; ?>" data-image="<?php echo $color['image']; ?>">
                                            <?php echo $color['color_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="quantity"><?php echo $product['colors'][0]['quantity']; ?></td>
                            <td class="price"><?php echo $product['colors'][0]['price']; ?></td>
                            <td><img src="http://localhost/Black-Aries-Project/public/images/products/<?php echo $product['colors'][0]['image']; ?>" alt="Product Image" width="50"></td>
                            <td>
                                <div class="btn-action">
                                    <form action="/editProduct.php" method="GET" class="form-edit">
                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                        <button type="submit" class="btn btn-edit">Edit</button>
                                    </form>
                                    <form action="http://localhost/Black-Aries-Project/AdminController/deleteProduct" method="POST" class="form-delete" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                        <button type="submit" class="btn btn-delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
    <!-- Modal to add new product -->
    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddProductModal()">&times;</span>
            <h2>Add New Product</h2>
            <form id="addProductForm" method="POST" action="http://localhost/Black-Aries-Project/AdminController/addProduct" enctype="multipart/form-data" onsubmit="return validateForm()">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="product_name" placeholder="Enter product name" required>

                <label for="productDescription">Product Description:</label>
                <textarea id="productDescription" name="product_description" placeholder="Enter product description" required></textarea>

                <label for="productCategory">Category:</label>
                <select id="productCategory" name="product_category">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="productStatus">Status:</label>
                <select id="productStatus" name="product_status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                <label for="productDiscount">Discount (%):</label>
                <input type="number" id="productDiscount" name="product_discount" min="0" max="100">

                <!-- Colors section -->
                <div id="colorsContainer">
                    <h3>Colors</h3>
                    <div class="color-row">
                        <label for="color">Color:</label>
                        <select class="colorSelect" name="color[]" required>
                            <?php foreach ($colors as $color): ?>
                                <option value="<?php echo $color['color_id']; ?>"><?php echo $color['color_name']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="quantity">Quantity:</label>
                        <input type="number" class="quantityInput" name="quantity[]" min="0" required>

                        <label for="price">Price:</label>
                        <input type="number" class="priceInput" name="price[]" min="0" required>

                        <label for="default">Default:</label>
                        <select class="defaultSelect" name="default[]">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>

                        <label for="image">Image:</label>
                        <input type="file" class="imageInput" name="image[]" accept="image/*" required>
                    </div>
                </div>

                <button type="button" onclick="addColorRow()">Add Another Color</button>
                <button type="submit">Save Product</button>
            </form>

        </div>
    </div>
    <script>
        function validateForm() {
            const productName = document.getElementById('productName').value;
            const colors = document.querySelectorAll('.colorSelect');
            const quantities = document.querySelectorAll('.quantityInput');
            const prices = document.querySelectorAll('.priceInput');
            const images = document.querySelectorAll('.imageInput');
            let errorMessage = '';

            // Kiểm tra tên sản phẩm
            if (!productName) {
                errorMessage += 'Product name is required.\n';
            }

            // Kiểm tra màu sắc
            colors.forEach((color, index) => {
                if (!color.value) {
                    errorMessage += `Color is required for row ${index + 1}.\n`;
                }
            });

            // Kiểm tra số lượng
            quantities.forEach((quantity, index) => {
                if (!quantity.value || quantity.value <= 0) {
                    errorMessage += `Quantity must be greater than 0 for row ${index + 1}.\n`;
                }
            });

            // Kiểm tra giá
            prices.forEach((price, index) => {
                if (!price.value || price.value <= 0) {
                    errorMessage += `Price must be greater than 0 for row ${index + 1}.\n`;
                }
            });

            // Kiểm tra hình ảnh
            images.forEach((image, index) => {
                if (!image.value) {
                    errorMessage += `Image is required for row ${index + 1}.\n`;
                }
            });

            if (errorMessage) {
                alert(errorMessage);
                return false;
            }

            return true;
        }
        document.addEventListener('DOMContentLoaded', function() {
            const colorSelects = document.querySelectorAll('.colorSelect');

            colorSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const productId = this.getAttribute('data-product-id');
                    const quantity = selectedOption.getAttribute('data-quantity');
                    const price = selectedOption.getAttribute('data-price');
                    const image = selectedOption.getAttribute('data-image');

                    const row = this.closest('tr');
                    row.querySelector('.quantity').textContent = quantity;
                    row.querySelector('.price').textContent = price;
                    row.querySelector('img').src = `http://localhost/Black-Aries-Project/public/images/products/${image}`;
                });
            });
        });
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
        // Open modal
        function openAddProductModal() {
            document.getElementById('addProductModal').style.display = 'block';
        }

        // Close modal
        function closeAddProductModal() {
            document.getElementById('addProductModal').style.display = 'none';
        }

        // Add a new color row
        function addColorRow() {
            const container = document.getElementById('colorsContainer');
            const colorRow = document.querySelector('.color-row').cloneNode(true);

            // Clear input values in the cloned row
            colorRow.querySelector('.quantityInput').value = '';
            colorRow.querySelector('.priceInput').value = '';
            colorRow.querySelector('.imageInput').value = '';
            colorRow.querySelector('.defaultSelect').value = '0';

            container.appendChild(colorRow);
        }
    </script>
</body>

</html>