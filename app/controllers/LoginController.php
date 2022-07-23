<?php
    class LoginController extends DController 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function index() 
        {
            $this->login();
        }

        public function login() 
        {
            session::init();
            if(session::get("login") == true) 
            {
                header("Location:".BASE_PATH."/LoginController/dashboard");
            }
            $this->load->view('login/header');
            $this->load->view('base/login');
            $this->load->view('login/footer');
        }

        public function dashboard() 
        {
            session::checkSession();
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $this->load->view('base/dashboard');
            $this->load->view('base/footer');
        }

        public function authenticationLogin() 
        {
            $username = $_POST['username'];
            $password_des = md5($_POST['password']);
            $table_user = 'user';
            $loginService = $this->load->service('LoginService');

            $count = $loginService->login($table_user, $username, $password_des);

            if($count == 0) 
            {
                header("Location:".BASE_PATH."/LoginController?msg=0"); 
            } 
            else 
            {
                $result = $loginService->getLogin($table_user, $username, $password_des);
                session::init();
                session::set('login', true);
                session::set('userId', $result[0]['userId']);
                session::set('username', $result[0]['username']);
                session::set('password_des', $result[0]['password_des']);
                session::set('permission', $result[0]['permission']);
                header("Location:".BASE_PATH."/LoginController/dashboard");
            }
        }

        public function logout() 
        {
            session::init();
            session::destroy();
            header("Location:".BASE_PATH."/LoginController"); 
        }
    }
?>
