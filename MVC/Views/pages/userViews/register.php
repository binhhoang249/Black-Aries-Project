<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/Black-Aries-Project/public/css/sign_up.css?ver=<?php echo time(); ?>">
    <style>
        .error {
            color: red;
            font-size: 14px;
            display: none;
            /* Ẩn lỗi mặc định */
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li style="margin-right:10px" class="breadcrumb-item"><a  href="http://localhost/Black-Aries-Project/home">Homepage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sign up</li>
            </ol>
        </nav>
        <div class="overlay"></div>
        <div class="content">
            <div class="logo-container">
                <div class="line"></div>
                <img src="http://localhost/Black-Aries-Project/public/images/logo.png" alt="Logo">
                <div class="line"></div>
            </div>
            <h1 class="title">WELCOME</h1>
            <form id="register-form" method="POST" action="/Black-Aries-Project/userController/register">
                <div class="form">
                    <input type="text" class="fullname" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    <span id="fullnameError" class="error">Full name is required</span>
                </div>
                <div class="form">
                    <input type="text" class="username" id="username" name="username" placeholder="Enter your username" required>
                    <span id="usernameError" class="error">Username must be at least 5 characters</span>
                </div>
                <div class="form">
                    <input type="email" class="email" id="email" name="email" placeholder="Enter your email" required>
                    <span id="emailError" class="error">Please enter a valid email</span>
                </div>
                <div class="form">
                  <div class="password-wrapper">
                    <input type="password" class="password" id="password" name="password" placeholder="Enter your password" required>
                    <i class="far fa-eye" id="toggle-password"></i>
                    <span id="passwordError" class="error">Password must be at least 6 characters</span>
                 </div>
              </div>
                <div class="form">
                    <div class="password-wrapper">
                        <input type="password" class="confirm-password" id="confirm-password" name="confirmpassword" placeholder="Re-enter your password" required>
                        <i class="far fa-eye" id="toggle-confirm-password"></i>
                        <span id="confirmPasswordError" class="error">Passwords do not match</span>
                    </div>
                </div>
                <p class="signin-text">
                    Already have account? <a href="http://localhost/Black-Aries-Project/userController/login">SIGN IN</a>
                </p>
                <button class="sign-btn" type="submit">Register</button>
            </form>

            <!-- Nút Sign up Google & Facebook -->
            <div class="signup">
                <button class="google-btn"><i class="fab fa-google"></i> Register with Google</button>
                <button class="facebook-btn"><i class="fab fa-facebook"></i> Register with Facebook</button>
            </div>

        </div>
    </div>
    <script>
        const form = document.getElementById("register-form");
        const fullname = document.getElementById("fullname");
        const username = document.getElementById("username");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirm-password");

        form.addEventListener("submit", function(event) {
            let valid = true;

            // Validate Full Name: Check if first letter is capitalized
            if (fullname.value.trim() === "") {
                document.getElementById("fullnameError").style.display = "block";
                valid = false;
            } else if (fullname.value.trim().charAt(0) !== fullname.value.trim().charAt(0).toUpperCase()) {
                document.getElementById("fullnameError").textContent = "Full name must start with an uppercase letter";
                document.getElementById("fullnameError").style.display = "block";
                valid = false;
            } else {
                document.getElementById("fullnameError").style.display = "none";
            }

            // Validate Username: Check if first letter is capitalized
            if (username.value.trim().length < 5) {
                document.getElementById("usernameError").style.display = "block";
                valid = false;
            } else if (username.value.trim().charAt(0) !== username.value.trim().charAt(0).toUpperCase()) {
                document.getElementById("usernameError").textContent = "Username must start with an uppercase letter";
                document.getElementById("usernameError").style.display = "block";
                valid = false;
            } else {
                document.getElementById("usernameError").style.display = "none";
            }

            // Validate Email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value.trim())) {
                document.getElementById("emailError").style.display = "block";
                valid = false;
            } else {
                document.getElementById("emailError").style.display = "none";
            }

            // Validate Password
            if (password.value.trim().length < 6) {
                document.getElementById("passwordError").style.display = "block";
                valid = false;
            } else {
                document.getElementById("passwordError").style.display = "none";
            }

            // Validate Confirm Password
            if (confirmPassword.value.trim() !== password.value.trim()) {
                document.getElementById("confirmPasswordError").style.display = "block";
                valid = false;
            } else {
                document.getElementById("confirmPasswordError").style.display = "none";
            }

            // Prevent form submission if invalid
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
    <script src="http://localhost/Black-Aries-Project/public/js/display.js" ></script>

</body>

</html>