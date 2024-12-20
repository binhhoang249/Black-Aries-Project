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
    <div id="forgot-password-container">
        <!-- Step 1: Email Input -->
        <div id="step-email" class="step active">
            <h1 class="title">Forgot password</h1>
            <p class="description">Enter your email to receive a verification code.</p>
            <form id="email-form">
                <input type="email" id="email-input" class="input-field" placeholder="Email address" required>
                <button type="submit" class="submit-button">Send email</button>
            </form>
        </div>
        
        <!-- Step 2: Verification Code -->
        <div id="step-verification" class="step">
            <h1 class="title">Forgot password</h1>
            <p class="description">Enter the verification code sent to your email.</p>
            <form id="verification-form">
                <input type="text" id="verification-code-input" class="input-field" placeholder="Verification Code" required>
                <button type="submit" class="submit-button">Confirm</button>
            </form>
        </div>

        <!-- Step 3: Reset Password -->
        <div id="step-reset-password" class="step">
            <h1 class="title">Forgot password</h1>
            <p class="description">Set a new password for your account.</p>
            <form id="reset-password-form">
                <div class="input-group">
                    <input type="password" id="new-password" class="input-field" placeholder="New password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <div class="input-group">
                    <input type="password" id="confirm-password" class="input-field" placeholder="Confirm password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <!-- <p id="password-match-status" class="status-text">Passwords match</p> -->
                <button type="submit" class="submit-button">Save Password</button>
            </form>
        </div>
    </div>

    <script src="public/js/forgotPassword.js" defer></script>
</body>
</html>
