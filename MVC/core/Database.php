<?php
class Database extends PDO {
    public function __construct($connect, $user, $pass) {
        parent::__construct($connect, $user, $pass);
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
        echo "SQL: $sql\n"; // In câu SQL ra để kiểm tra
        print_r($data); // In dữ liệu truyền vào
        $statement = $this->prepare($sql);
        foreach($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement->execute();

        if (!$statement->execute()) {
            echo "Lỗi cập nhật dữ liệu!";
        } else {
            echo "Cập nhật thành công!";
        }
        
    }


    public function delete($table, $condition, $limit = 1) {
        $sql = "delete from $table where $condition limit $limit";
        return $this->exec($sql);
    }

 }