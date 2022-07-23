<?php
    class ExpectationController extends DController 
    {
        public function __construct() 
        {
            session::checkSession();
            parent::__construct();
        }

        public function index() 
        {
            $this->expectation();
        }

        public function expectation() 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $this->load->view('base/expectation/expectation');
            $this->load->view('base/footer');
        }

        public function listExpectation() 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $userId = session::get('userId');
            $expectationService = $this->load->service('ExpectationService');
            $expectationList = $expectationService->listExpectation($userId);
            $gradeList = $expectationService->getGradeList($userId);
            
            $expectationInfor = array('expectationList' => $expectationList, 
                                    'gradeList' => $gradeList);
            $this->load->view('base/expectation/listExpectation', $expectationInfor);
            $this->load->view('base/footer');
        }

        public function deleteExpectation($majorId) 
        {
            // $this->load->view('base/header');
            // $this->load->view('base/menu');
            $userId = session::get('userId');
            $table = "expectation";
            $expectationService = $this->load->service('ExpectationService');
            if($expectationService->countExpectation($table, $userId) >1 ) 
            {
                $result = $expectationService->deleteExpectation($majorId, $userId);
                if ($result == null || $result >= 1) 
                {
                    header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=1");
                }
                else 
                {
                    header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=0");
                }
            } 
            else 
            {
                $result = $expectationService->deleteAllExpectation($majorId, $userId);
                if ($result == null || $result >= 1) 
                {
                    header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=1");
                }
                else 
                {
                    header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=0");
                }
            }
            // $this->load->view('base/footer');
        }

        public function insertExpectation() 
        {
            $expectationService = $this->load->service('ExpectationService');
            $table = "expectation";
            $userId = session::get('userId');
            $majorId = $_POST['majorId'];
            $expectation_order = ($expectationService->countExpectation($table, $userId)) + 1;
            $data = array(
                'userId' => $userId,
                'majorId' => $majorId,
                'expectation_order' => $expectation_order
            );
            $result = $expectationService->insertExpectation($table, $data);
            if($result) 
            {
                header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=3");
            } 
            else 
            {
                header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=2");
            }
        }

        public function addExpectation($majorId) 
        {
            $expectationService = $this->load->service('ExpectationService');
            $userId = session::get('userId');
            $isCanApply = $expectationService->checkGradeApply($userId, $majorId);
            if(!$isCanApply) 
            {
                header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=4");
            } 
            else 
            {
                $table = "expectation";
                $expectation_order = ($expectationService->countExpectation($table, $userId)) + 1;
                $data = array(
                    'userId' => $userId,
                    'majorId' => $majorId,
                    'expectation_order' => $expectation_order
                );
    
                $result = $expectationService->insertExpectation($table, $data);
                if($result)
                {
                    header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=3");
                } 
                else 
                {
                    header('Location:'.BASE_PATH."/ExpectationController/listExpectation?msg=2");
                }
            }
        }

        public function editExpectation() 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $this->load->view('base/expectation/editExpectation');
            $this->load->view('base/footer');
        }
    }
?>