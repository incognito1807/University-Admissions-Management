<?php
    class UserController extends DController 
    {
        public function __construct() 
        {
            session::checkSession();
            parent::__construct();
        }

        public function index() 
        {
            $this->user();
        }

        public function user() 
        {
            $this->load->view('base/user/header');
            $this->load->view('base/menu');
            $this->load->view('base/user/inforUser');
            $this->load->view('base/footer');
        }

        public function getInforUser() 
        {
            $this->load->view('base/user/header');
            $this->load->view('base/menu');
            $userId = session::get('userId');
            $userService = $this->load->service('UserService');
            $user = $userService->getInforUser($userId);
            $this->load->view('base/user/inforUser', $user);
            $this->load->view('base/footer');
        }

        public function searchGrade() 
        {
            $userId = null;
            $this->load->view('base/user/header');
            $this->load->view('base/menu');
            $searchFor = 1;
            if (isset($_POST['id_user_search']) == null) 
            {
                $userId = session::get('userId');
                $searchFor = 0;
            } else {
                $userId = $_POST['id_user_search'];
            }
            $permission = session::get('permission');
            $userService = $this->load->service('UserService');
            $userGrade = $userService->searchGrade($userId, $permission);

            $expectationService = $this->load->service('ExpectationService');
            $expectationList = $expectationService->listExpectation($userId);
            $gradeList = $expectationService->getGradeList($userId);

            $data = array(
                'userGrade' => $userGrade, 
                'searchFor' => $searchFor,
                'expectationList' => $expectationList, 
                'gradeList' => $gradeList
            );
            $this->load->view('base/user/searchGrade', $data);
            $this->load->view('base/footer');
        }

        public function editUser() 
        {
            $this->load->view('base/user/header');
            $this->load->view('base/menu');
            $userId = session::get('userId');
            $userService = $this->load->service('UserService');
            $user = $userService->editUser($userId);
            $this->load->view('base/user/editUser', $user);
            $this->load->view('base/footer');
        }

        public function updateUser() 
        {
            $table = "user";
            $userId = session::get('userId'); 

            $cond = "user.userId = $userId";
            $domicile = $_POST['domicile'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $userService = $this->load->service('UserService');

            $data = array(
                'domicile' => $domicile,
                'address' => $address,
                'email' => $email,
                'phone_number' => $phone_number
            );
            $result = $userService->updateUser($table, $data, $cond);
            if($result) 
            {
                header('Location:'.BASE_PATH."/UserController/getInforUser?msg=1");
            } 
            else 
            {
                header('Location:'.BASE_PATH."/UserController/getInforUser?msg=0");
            }
        }

        public function editPass() 
        {
            $this->load->view('base/user/header');
            $this->load->view('base/menu');
            $userId = session::get('userId');
            $userService = $this->load->service('UserService');
            $user = $userService->editPass($userId);
            $this->load->view('base/user/editPass', $user);
            $this->load->view('base/footer');
        }

        public function authenticationEditPass() 
        {
            $userId = session::get('userId');
            $pass_old = md5($_POST['old_pass']);
            $pass_new1 = md5($_POST['new_pass1']);
            $pass_new2 = md5($_POST['new_pass2']);
            $password = session::get('password_des');
            if($pass_old != $password) 
            {
                header('Location:'.BASE_PATH."/UserController/editPass?msg=2");
            } 
            else 
            {
                if($pass_new2 != $pass_new1) 
                {
                    header('Location:'.BASE_PATH."/UserController/editPass?msg=3");
                } 
                else
                {
                    $data = array(
                        'password_des' => $pass_new1
                    );
                    $table = "user";
                    $cond = "user.userId = $userId";
                    $userService = $this->load->service('UserService');
                    $result = $userService->updatePass($table, $data, $cond);
                    session::set('password_des', $pass_new1);
                    header('Location:'.BASE_PATH."/UserController/getInforUser?msg=4");
                }
            }
        }
    }
?>