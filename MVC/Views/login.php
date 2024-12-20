<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="http://localhost/Black-Aries-Project/public/css/login.css?ver=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
    <main>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li style="margin-right:10px" class="breadcrumb-item"><a  href="http://localhost/Black-Aries-Project/home">Homepage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sign in</li>
            </ol>
        </nav>
        <div class="overlay"></div>
        <div class="lg-content">
            <div class="logol">
                <hr>
                <div class="lg-logo"><img src="http://localhost/Black-Aries-Project/public/images/logo_shop-removebg-preview.png" alt=""></div>
                <hr>
            </div>
            <p class="p1">HELLO!</p>
            <p class="p2">WELCOME BACK</p>
            <form action="http://localhost/Black-Aries-Project/login" method="POST">
                <label for="">
                    <input type="text" name="username" placeholder="User name" required>
                </label>
                <label for="">
                    <input type="password" name="password" placeholder="Password" required>
                    <a href="http://localhost/black-Aries-Project/user/forgetPassword">Forgot password</a>
                </label>
                <div class="lg-flex">
                    <button type="submit">Sign in</button>
                </div>
                <div class="lg-flex">
                    <div class="lg-su"><a href="http://localhost/black-Aries-Project/register">Sign up</a></div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>