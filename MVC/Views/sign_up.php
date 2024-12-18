<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/Black-Aries-Project/public/css/sign_up.css">
</head>
<body>
    <div class="container">
    <div class="overlay"></div>

        <div class="content">
        <div class="logo-container">
                <div class="line"></div>
                <img src="public/images/logo.png" alt="Logo">
                <div class="line"></div>
            </div>
                <h1 class="title">WELCOME</h1>
            <form action="" method="POST" name="myForm" onsubmit="return validateForm();">
                    <div class="form">
                        <input type="text" class="fullname" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </div>  
                    <div class="form">
                        <input type="text" class="username" id="username" name="username" placeholder="Enter your username" required>
                    </div>  
                    <div class="form">
                        <input type="text" class="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form">
                        <input type="password" class="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form">
                    <input type="password" class="confirm-password" id="confirm-password" name="confirmpassword" placeholder="Re-enter your password" required>
                     </div>
                    </form>
                    <p class="signin-text">
                        Already have account? <a href="#">SIGN IN</a>
                    </p>

                    <!-- Nút Sign up Google & Facebook -->
                    <div class="signup">
                        <button class="sign-btn">Register</button>
                        <button class="google-btn"><i class="fab fa-google"></i> Register with Google</button>
                        <button class="facebook-btn"><i class="fab fa-facebook"></i> Register with Facebook</button>
                    </div>
                 
            </div>
        </div>
</body>
</html>