<?php
    class IndexController extends DController 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function index() 
        {
            $this->homepage();
        }

        public function homepage() 
        {
            $this->load->view('base/header');
            session::checkSession();
            if(session::get('login') == true) 
            {
                $this->load->view('base/menu');
                $this->load->view('base/dashboard');
            } 
            else 
            {
                $this->load->view('base/login');
            }
            $this->load->view('base/footer');
        }

        public function notFound() 
        {
            session::checkSession();
            if(session::get('login') == true) 
            {
                header("Location:".BASE_PATH."/LoginController/dashboard");
            } 
            else 
            {
                header("Location:".BASE_PATH."/LoginController"); 
            }
        }
    }
?>
