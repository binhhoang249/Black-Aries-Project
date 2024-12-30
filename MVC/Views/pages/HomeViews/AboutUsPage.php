<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>

    <!-- Đảm bảo đường dẫn CSS đúng -->
    <link rel="stylesheet" type="text/css" href="http://localhost/Black-Aries-Project/public/css/AboutUs.css">
</head>

<body>
    <div class="container">
        <?php include_once 'MVC/Views/Components/Header.php'; ?>

        <div class="banner">
            <img src="http://localhost/Black-Aries-Project/public/images/aboutus.png" alt="Banner">
            <h1 class="title">About Us</h1>
        </div>
        <div class="information-business">
            <h2><?php echo htmlspecialchars($data['businessName']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($data['description'])); ?></p>
        </div>
    </div>
</body>
</html>
