<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sign Up</title>
    <link rel="stylesheet"  href="http://localhost/Black-Aries-Project/public/css/sign_up.css">
</head>
<body>
    <div class="container">
        <div class="overlay"></div>
        <div class="content">
            <div class="logo-container">
                <div class="line"></div>
                <form method="POST"  action="Register/registerUser">
                    <input type="text" name="username" placeholder="Enter your username" required>
                    <input type="text" name="fullname" placeholder="Enter your full name" required>
                    <input type="email" name="mail" placeholder="Enter your email" required>
                    <div class="password-wrapper">
                        <input type="password" class="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form">
                        <div class="password-wrapper">
                            <input type="password" class="confirm-password" id="confirm-password" name="confirmpassword" placeholder="Re-enter your password" required>
                            <i class="far fa-eye" id="toggle-confirm-password"></i>
                        </div>
                    </div>
                    <p class="signin-text">
                        Already have an account? <a href="#">SIGN IN</a>
                    </p>
                    <button class="sign-btn" type="submit">Register</button>
                </form>
                <div class="signup">
                    <button class="google-btn"><i class="fab fa-google"></i> Register with Google</button>
                    <button class="facebook-btn"><i class="fab fa-facebook"></i> Register with Facebook</button>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("toggle-confirm-password").addEventListener("click", function() {
                const passwordInput = document.getElementById("confirm-password");
                const icon = this;
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            });
        </script>
    </div>
</body>
</html>
