<?php
    class Model extends PDO
    {  
        public function __construct($connect, $user, $pass) 
        {
            parent::__construct($connect, $user, $pass);
        }

        public function select($query, $data = array(), $fetchStyle = PDO::FETCH_ASSOC) 
        {
            $statement = $this->prepare($query);
            foreach($data as $key => $value) {
                $statement->bindParam($key, $value);
            }
            $statement->execute();
            return $statement->fetchAll();
        }

        //chèn 
        public function insert($table, $data) 
        {
            $keys = implode(",", array_keys($data));
            $values = ":".implode(", :", array_keys($data));

            $query = "INSERT INTO $table($keys) VALUES($values)";
            $statement = $this->prepare($query);

            foreach($data as $key => $value) 
            {
                $statement->bindValue(":$key", $value);
            }
            return $statement->execute();
        }
        //end chèn

        //update
        public function update($table, $data, $cond) 
        {
            $updateKeys = NULL;
            foreach($data as $key => $value) 
            {
                $updateKeys .= "$key=:$key,";
            }
            $updateKeys = rtrim($updateKeys, ",");
            $query = "UPDATE $table SET $updateKeys WHERE $cond";
            $statement = $this->prepare($query);
            foreach($data as $key => $value) 
            {
                $statement->bindValue(":$key", $value);
            }
            return $statement->execute();
        }
        //end update

        //xóa 
        public function delete($majorId, $userId) 
        {
            echo "<script>console.log('vao db:' " . $majorId ." );</script>";
            $query = "UPDATE expectation SET `expectation_order` = `expectation_order` - 1 WHERE `expectation_order` > 
                      (SELECT `expectation_order` FROM expectation WHERE expectation.majorId = '$majorId' AND `userId` = $userId);
                      DELETE FROM expectation WHERE expectation.majorId = '$majorId' AND expectation.userId = $userId;";
            return $this->exec($query);
        }
        //end xóa 

        //xóa khi chỉ có dưới 1 nguyện vọng
        public function deleteAll($majorId, $userId) 
        {
            $query = "DELETE FROM expectation WHERE expectation.majorId = '$majorId' AND expectation.userId = $userId";
            return $this->exec($query);
        }

        //đếm số nguyện vọng dự tuyển
        public function countEnrollment($query) 
        {
            $statement = $this->prepare($query);
            return $statement->rowCount(PDO::FETCH_ASSOC);
        }

        //đếm số nguyện vọng của userId
        public function count($query, $userId) 
        {
            $statement = $this->prepare($query);
            $statement->execute(array($userId));
            return $statement->rowCount(PDO::FETCH_ASSOC);
        }

        //hàm check username, password
        public function affectedRows($query, $username, $password) 
        {
            $statement = $this->prepare($query);
            $statement->execute(array($username, $password));
            return $statement->rowCount(PDO::FETCH_ASSOC);
        }

        //hàm select user
        public function selectUser($query, $username, $password) 
        {
            $statement = $this->prepare($query);
            $statement->execute(array($username, $password));
            return $statement->fetchAll();
        }
    }
?>