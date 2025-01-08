<?php
class Database extends PDO {
    public function __construct($connect, $user, $pass) {
        parent::__construct($connect, $user, $pass);
        $this->insertAdmin();
    }

    public function select($sql,$data = array(), $fetchStyle = PDO::FETCH_ASSOC) {
        $statement = $this->prepare($sql);
        foreach($data as $key => $value) {
            $statement->bindValue($key, $value);
        }
        $statement->execute();
        return $statement->fetchAll($fetchStyle);
    }

    public function insert($table_jobs, $data) {
        $keys = implode(',',array_keys($data));

        $values = ":" . implode(', :',array_keys($data));

        $sql = "insert into $table_jobs($keys) values($values)";
        var_dump($sql); 
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }
    public function insertApplication($table_applications, $data) {
        $keys = implode(',',array_keys($data));

        $values = ":" . implode(', :',array_keys($data));

        $sql = "insert into $table_applications($keys) values($values)";
        $statement = $this->prepare($sql);

        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }

    public function update($table, $data, $condition) {
        $updateKeys = NULL;
        foreach ($data as $key => $value) {
            $updateKeys .= "$key=:$key,";
        }

        $updateKeys = rtrim($updateKeys, ',');

        $sql = "update $table set $updateKeys where $condition";
        $statement = $this->prepare($sql);
        foreach($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();
    }


    public function delete($table, $condition, $limit = 1) {
        $sql = "delete from $table where $condition limit $limit";
        return $this->exec($sql);
    }
    public function insertAdmin(){
         // Kiểm tra xem username hoặc email đã tồn tại hay chưa
        $checkSql = "SELECT * FROM Users WHERE username = 'Admin123' AND role = 1";
        $checkStmt = $this->prepare($checkSql);
        $checkStmt->execute();
        $existingUser = $checkStmt->fetch(PDO::FETCH_ASSOC);
        if ($existingUser) {
        } else {
            $password= password_hash("adminblack",PASSWORD_DEFAULT);
            $sql = 'INSERT into Users (fullname, date_of_birth, phone, email, username, password, avatar, role, address)
            values( "Phạm Thành Công","2003-01-01","0923333123","nguyenthong0855@gmail.com","Admin123","'.$password.'","123.png",1,"Đà Nẵng");';
            $stmt = $this->prepare($sql);
            $stmt->execute();
        }
    }

 }