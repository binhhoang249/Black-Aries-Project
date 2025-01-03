<?php
class UserModel extends DModel {
    public function __construct(){
        parent::__construct();
    }
    public function findUser($condition){
        $sql = "SELECT * FROM Users where " . $condition;
        return $this->db->select($sql);
    }
    public function getUsers(){
        $sql = "SELECT * FROM Users";
        return $this->db->select($sql);
    }
    public function getUser($id){
        $sql = "SELECT * FROM Users where user_id = :user_id";
        $data[':user_id']=$id;
        return $this->db->select($sql,$data);
    }
    // Cú pháp update $table set $data[0] = :$data[0] where $condition(vd: user_id =1;)
    public function setUser($table,$data,$condition){
        return $this->db->update($table,$data,$condition);
    }
    public function addUser($username,$name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $username,
            'fullname' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'role'=>2
        ];
        $checkSql = "SELECT * FROM Users WHERE email = :email";
        $checkUser = $this->db->select($checkSql, ['email' => $email]);

        if (!empty($checkUser)) {
            return ['status' => false, 'message' => 'Email already exists!'];
        }
        $result = $this->db->insert("Users", $data,);
        return $result ? ['status' => true, 'message' => 'Registration successful!'] : ['status' => false, 'message' => 'Error adding user!'];
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