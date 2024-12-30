<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Personal Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            height: 100vh;
            /* Chiều cao của trang bằng 100% viewport */
            margin: 0;
            background-color: #f0f0f0;
            text-align: center;
        }

        .content {
            width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #DAECF9;
            /* Màu xanh nhạt */
            position: relative;
        }

        .title {
            margin-top: 0;
            text-align: center;
            font-size: 38px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        img {
            width: 150px;
            height: 100px;
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
            text-decoration: none;
            color: #527A9A;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .back-btn img {
            width: 20px;
            height: 20px;
        }

        .back-btn:hover {
            color: #395d72;
        }

        /* Nút chỉnh sửa avatar */
        .logo-container {
            position: relative;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
        }

        .avatar {
            position: relative;
        }

        /* div cho phần nhập ảnh từ file */
        .update_avatar {
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
            display: none;
            flex-direction: column;
            align-items: center;
        }

        .ve_avartar {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px;
            width: 90px;
            height: 25px;
            background-color: #527A9A;
            color: #f0f0f0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
            margin-top: 20px;
            margin-right: 30px
        }

        .edit-avatar-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 25px;
            height: 25px;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .edit-avatar-btn img {
            width: 15px;
            height: 15px;
        }

        .edit-avatar-btn:hover {
            background-color: #395d72;
        }

        .form-group {
            margin-bottom: 20px;
            margin-left: 20px;
        }

        .form-label {
            display: flex;
            align-items: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            margin-left: 27px;


        }

        .form-label img {
            width: 20px;
            /* Kích thước icon */
            height: 20px;
            margin-right: 10px;
            /* Khoảng cách giữa icon và tiêu đề */
        }

        .form-group input {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .button {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;

        }

        .button button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 15px;
            width: 150px;
            height: 45px;
            background-color: #527A9A;
            color: #f0f0f0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 14px;
            font-weight: bold;
        }

        .button button img {
            width: 20px;
            height: 20px;
        }

        .button button:hover {
            background-color: #395d72;
        }

        .form2,
        .h2 {
            display: none;
        }
        .password-wrapper {
        position: relative;
        width: 100%;
    }

    .password-wrapper input {
        width: 94%;
        padding-right: 40px;
        padding-left: 10px;
        border: 1px soild #CCC;
    }

    .password-wrapper i {
        position: absolute;
        right: 20px;
        top: 27%;
        transform: translateY(-50);
        font-size: 16px;
        z-index: 2;
    }
    </style>
</head>

<body>
    <div class="content">
        <a href="http://localhost/Black-Aries-Project/HomeController" class="back-btn">
            Back
        </a>
        <h2 class="title h1">PERSONAL INFORMATION</h2>
        <h2 class="title h2">Change Password</h2>
        <div class="avatar">
    <div class="logo-container">
        <!-- Hiển thị ảnh mặc định -->
        <img id="l-imagel" src="http://localhost/Black-Aries-Project/public/images/default-images.jpg" alt="deafault-images">
        <button class="edit-avatar-btn">
            <img src="http://localhost/Black-Aries-Project/public/Icon/pen.png" alt="Edit Icon">
        </button>
    </div>
    <div class="update_avatar" style="display: none;">
        <input type="file" id="avataruser">
        <button type="button" id="ve_avartar" class="ve_avartar">Verify</button>
    </div>
</div>
   <form action="" method="POST" class="form1" name="myForm" autocomplete="off" onsubmit="return validateForm();">
            <!-- Tên đăng nhập -->
            <div class="form-group">
                <label for="username" class="form-label">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/profile.png" alt="Icon profile"> User name:
                </label>
                <input type="text" id="username" name="username" readonly>
            </div>

            <!-- Họ tên -->
            <div class="form-group">
                <label for="fullname" class="form-label">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/pen.png" alt="Icon full name"> Full name:
                </label>
                <input type="text" id="fullname" name="fullname" readonly>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/Email.png" alt="Icon email"> Email:
                </label>
                <input type="email" id="email" name="email" readonly>
            </div>

            <!-- Mật khẩu -->
            <div class="form-group">
                <label for="password" class="form-label">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/Key 02.png" alt="Icon password"> Password:
                </label>
                <input type="password" id="password" name="password" autocomplete="new-password" readonly>
            </div>
            <div class="button">
                <button type="button" class="change-btn">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/Key.png" alt="Change Icon"> Change password
                </button>
                <button type="button" class="up-btn" data-check="1">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/update.png" alt="Update Icon"> <span>Update</span>
                </button>
                <a href="http://localhost/Black-Aries-Project/HomeController&&logout=successt">
                    <button type="button" class="ca-btn">
                        <img src="http://localhost/Black-Aries-Project/public/Icon/logout.png" alt="Logout Icon"> Log out
                    </button>
                </a>
            </div>
        </form>
        <!--form mật khẩu -->
        <form class="form2" name="myForm">
         <div class="form-group">
                <label for="Opassword" class="form-label">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/Key 02.png" alt="Icon password"> Old password:
                </label>
                <div class="password-wrapper">
                    <input type="password" id="Opassword" name="password" autocomplete="new-password">
                    <i class="far fa-eye toggle-password"></i>
                </div>
           </div>
            <div class="form-group">
                <label for="Npassword" class="form-label">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/Key 02.png" alt="Icon password"> New password:
                </label>
                <div class="password-wrapper">
                    <input type="password" id="Npassword" name="password" autocomplete="new-password">
                    <i class="far fa-eye toggle-password"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="Cpassword" class="form-label">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/Key 02.png" alt="Icon password"> Confirm your password:
                </label>
                <div class="password-wrapper">
                    <input type="password" id="Cpassword" name="password" autocomplete="new-password">
                    <i class="far fa-eye toggle-password"></i>
                </div>
            </div>
            <div class="button">
                <button type="button" class="updatePass-btn">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/update.png" alt="Update Icon"> <span>Update</span>
                </button>
                <button type="button" class="caPass-btn">
                    <img src="http://localhost/Black-Aries-Project/public/Icon/logout.png" alt="Logout Icon"> Cancel
                </button>
            </div>
        </form>
    </div>
    <script>// Lắng nghe sự kiện click trên tất cả các biểu tượng mắt
document.querySelectorAll(".toggle-password").forEach(icon => {
    icon.addEventListener("click", function() {
        // Lấy trường mật khẩu tương ứng với biểu tượng mắt
        const passwordInput = this.previousElementSibling;  // Trường mật khẩu nằm ngay trước biểu tượng mắt
        const icon = this;

        // Kiểm tra và thay đổi kiểu mật khẩu
        if (passwordInput.type === "password") {
            passwordInput.type = "text"; // Hiển thị mật khẩu
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash"); // Thay đổi biểu tượng mắt
        } else {
            passwordInput.type = "password"; // Ẩn mật khẩu
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye"); // Thay đổi biểu tượng mắt bị gạch
        }
    });
});
</script>
    <script src="http://localhost/Black-Aries-Project/public/js/profile.js?ver=<?php echo time(); ?>"></script>
</body>

</html>