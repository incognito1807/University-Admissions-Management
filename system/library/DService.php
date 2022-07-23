<?php
    class DService 
    {
        protected $model = array();
        public function __construct() 
        {
            $connect = 'mysql:dbname=tuyensinh; host=localhost; charset=utf8';
            $user = 'root';
            $pass = '';
            $this->model = new Model($connect, $user, $pass);
        }
    }
?>