<?php
class LoginModel extends DModel {
    public function __construct() {
        parent::__construct();
    }

    public function authenticateUser ($username, $password) {
        // Truy vấn để lấy thông tin người dùng dựa trên username
        $sql = "SELECT * FROM Users WHERE username = :username";
        $user = $this->db->select($sql, [':username' => $username]);

        // Kiểm tra xem người dùng có tồn tại không
        if (empty($user)) {
            return ['status' => false, 'message' => 'Username không tồn tại!'];
        }

        // Kiểm tra mật khẩu
        if (password_verify($password, $user[0]['password'])) {
            // Nếu mật khẩu đúng, trả về thông tin người dùng
            return ['status' => true, 'user' => $user[0]];
        } else {
            return ['status' => false, 'message' => 'Mật khẩu không đúng!'];
        }
    }
}
?>