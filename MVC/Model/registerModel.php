<?php
class RegisterModel extends DModel {
    public function __construct() {
        parent::__construct();
    }
    public function addUser($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'full_name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ];
        $checkSql = "SELECT * FROM users WHERE email = :email";
        $checkUser = $this->db->select($checkSql, ['email' => $email]);

        if (!empty($checkUser)) {
            return ['status' => false, 'message' => 'Email đã tồn tại!'];
        }
        $result = $this->db->insert("users", $data);
        return $result ? ['status' => true, 'message' => 'Đăng ký thành công!'] : ['status' => false, 'message' => 'Lỗi khi thêm người dùng!'];
    }
}
?>
