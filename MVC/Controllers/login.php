<?php
class login extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = self::model("LoginModel");
            $result = $model->authenticateUser ($username, $password);

            if ($result['status']) {
                // Đăng nhập thành công, có thể lưu thông tin người dùng vào session
                $_SESSION['user'] = $result['user'];
                header("Location: /home"); // Chuyển hướng đến trang chính
            } else {
                // Đăng nhập thất bại, hiển thị thông báo lỗi
                $data['error'] = $result['message'];
                self::view("login", $data);
            }
        } else {
            // Hiển thị trang login
            self::view("login");
        }
    }
}
?>