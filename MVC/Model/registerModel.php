<?php
class registerModel extends DModel {
    public function __construct() {
        parent::__construct();
    }

    public function addUser($username,$name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $username,
            'fullname' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ];
        $checkSql = "SELECT * FROM users WHERE email = :email";
        $checkUser = $this->db->select($checkSql, ['email' => $email]);

        if (!empty($checkUser)) {
            return ['status' => false, 'message' => 'Email already exists!'];
        }
        $result = $this->db->insert("users", $data);
        return $result ? ['status' => true, 'message' => 'Registration successful!'] : ['status' => false, 'message' => 'Error adding user!'];
    }
}
?>
