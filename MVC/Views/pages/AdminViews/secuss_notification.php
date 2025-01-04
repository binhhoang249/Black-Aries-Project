<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .notification {
            background-color:rgb(21, 80, 112);
            color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .notification h1 {
            margin: 0;
            font-size: 24px;
        }
        .notification p {
            margin: 10px 0 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="notification">
    <h1>Success!</h1>
    <p>You have successfully updated your order status.</p>
</div>

    <script>
        // Tự động chuyển hướng về trang ban đầu sau 3 giây
        setTimeout(function() {
            window.location.href = 'http://localhost/Black-Aries-Project/AdminController/orderManagement?position=3'; 
        }, 3000); 
    </script>
</body>
</html>