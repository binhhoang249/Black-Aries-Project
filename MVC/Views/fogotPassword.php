<?php if(isset($data)){extract($data);} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/Black-Aries-Project/public/css/forgotpassword.css">
</head>
<body>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li style="margin-right:10px" class="breadcrumb-item"><a  href="http://localhost/Black-Aries-Project/home">Homepage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Forgot password</li>
            </ol>
        </nav>
    <div id="forgot-password-container">
        <div id="step-email" class="step active">
            <h1 class="title">Forgot password</h1>
            <!-- Step 1: Email Input -->
            <?php if(isset($check)&&$check==1) : ?>
            <p class="description">Enter your email to receive a verification code.</p>
            <form id="email-form" action="http://localhost/black-Aries-Project/user/forgetPassword" method="POST">
                <input type="email" id="email-input" class="input-field" placeholder="Email address" name="email" required>
                <button type="submit" class="submit-button" name="con_email">Send email</button>
            </form>
            <!-- Step 2: Verification Code -->
            <?php elseif(isset($check)&&$check==2) : ?>
            <p class="description">Enter the verification code sent to your email.</p>
            <form id="verification-form" action="http://localhost/black-Aries-Project/user/forgetPassword" method="POST">
                <input type="text" name="code" id="verification-code-input" class="input-field" placeholder="Verification Code" required>
                <button type="submit" class="submit-button" name="con_code">Confirm</button>
            </form>
            <!-- Step 3: Reset Password -->
            <?php elseif(isset($check)&&$check==3) : ?>
            <p class="description">Set a new password for your account.</p>
            <form name="myForm" id="reset-password-form" action="http://localhost/black-Aries-Project/user/forgetPassword" method="POST" onsubmit="return validateForm();">
                <div class="input-group">
                    <input type="password" name="password" id="new-password" class="input-field" placeholder="New password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <div class="input-group">
                    <input type="password" name="cPassword" id="confirm-password" class="input-field" placeholder="Confirm password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <!-- <p id="password-match-status" class="status-text">Passwords match</p> -->
                <button type="submit" class="submit-button" name="change_password">Save Password</button>
            </form>
            <?php endif ; ?>
            <p class="signin-text">
                    Already have account? <a href="http://localhost/Black-Aries-Project/login">SIGN IN</a>
            </p>
        </div>
    </div>

    <script src="http://localhost/Black-Aries-Project/public/js/forgotPassword.js" defer></script>
</body>
</html>
