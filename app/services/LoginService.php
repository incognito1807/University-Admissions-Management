<?php
    class LoginService extends DService 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function login($table_user, $username, $password_des) 
        {
            $query = "SELECT * FROM $table_user WHERE username=? AND password_des=?";
            return $this->model->affectedRows($query, $username, $password_des);
        }

        public function getLogin($table_user, $username, $password_des) 
        {
            $query = "SELECT * FROM $table_user WHERE username=? AND password_des=?";
            return $this->model->selectUser($query, $username, $password_des);
        }
    }
?>