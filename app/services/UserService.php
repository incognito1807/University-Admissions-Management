<?php
    class UserService extends DService 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function getInforUser($userId) 
        {
            $query = "SELECT * FROM user WHERE `userId` = '$userId'";
            return $this->model->select($query);
        }

        public function searchGrade($userId, $permission) 
        {
            if ($permission == 0) 
            {
                $query = "SELECT * FROM user WHERE `userId` = '$userId'";
            } 
            else 
            {
                $query = "SELECT * FROM user join expectation ON user.userId = expectation.userId
                WHERE `userId` = '$userId'";
            }
            $query = "SELECT * FROM user WHERE `userId` = '$userId'";
            return $this->model->select($query);
        }

        public function editUser($userId) 
        {
            $query = "SELECT * FROM user WHERE `userId` = '$userId'";
            return $this->model->select($query);
        }

        public function editPass($userId) 
        {
            $query = "SELECT * FROM user WHERE `userId` = '$userId'";
            return $this->model->select($query);
        }

        public function updateUser($table, $data, $cond) 
        {
            return $this->model->update($table, $data, $cond);
        }

        public function updatePass($table, $data, $cond) 
        {
            return $this->model->update($table, $data, $cond);
        }
    }
?>