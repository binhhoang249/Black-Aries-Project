<?php
class userModel extends DModel {
    public function __construct(){
        parent::__construct();
    }
    public function getUsers(){
        $sql = "SELECT * FROM Users";
        return $this->db->select($sql);
    }
    // Cú pháp update $table set $data[0] = :$data[0] where $condition(vd: user_id =1;)
    public function setUser($table,$data,$condition){
        return $this->db->update($table,$data,$condition);
    }
}

?>