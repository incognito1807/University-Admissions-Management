<?php
    class StatisticController extends DController 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function index() 
        {
            $this->statistic();
        }

        public function statistic() 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $this->load->view('base/university/listUniversity');
            $this->load->view('base/footer');
        }

        public function listStatisticEnrollment($majorId) 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $statisticService = $this->load->service('StatisticService');
            $listStatisticEnrollment = $statisticService->listStatisticEnrollment($majorId, null, null);
            $inforMajorEnrollment = $statisticService->inforMajorEnrollment($majorId);
            $countStatistic = count($listStatisticEnrollment);
            $infor = array('listStatisticEnrollment' => $listStatisticEnrollment, 
                           'inforMajorEnrollment' => $inforMajorEnrollment,
                           'countStatistic' => $countStatistic);
            $this->load->view('admin/listStatisticEnrollment', $infor);
            $this->load->view('base/footer');
        }

        public function prepareToSetNewBenchmark($majorId) 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $statisticService = $this->load->service('StatisticService');
            $listStatisticEnrollment = $statisticService->listStatisticEnrollment($majorId, null, null);
            $countStatistic = $statisticService->countStatistic($majorId);
            $inforMajorEnrollment = $statisticService->inforMajorEnrollment($majorId);
            $target = $inforMajorEnrollment[0]['target'];

            if($target < $countStatistic) 
            {
                $autoGetNewBenchmark = $listStatisticEnrollment[$target - 1]["apply_grade"];
            } 
            else 
            {
                $autoGetNewBenchmark = $listStatisticEnrollment[$countStatistic - 1]["apply_grade"];
            }
            $infor = array('listStatisticEnrollment' => $listStatisticEnrollment, 
                           'inforMajorEnrollment' => $inforMajorEnrollment,
                           'countStatistic' => $countStatistic,
                           'autoGetNewBenchmark' => $autoGetNewBenchmark);
            $this->load->view('admin/prepareToSetNewBenchmark', $infor);
            $this->load->view('base/footer');
        }

        public function confirmToSetNewBenchmark($majorId, $newBenchmark = null) 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            
            $statisticService = $this->load->service('StatisticService');
            $inforMajorEnrollment = $statisticService->inforMajorEnrollment($majorId);
            $countStatistic = $statisticService->countStatistic($majorId);
            $target = $inforMajorEnrollment[0]['target'];


            if($newBenchmark == null) 
            {
                $listPassMajor = $statisticService->listStatisticEnrollment($majorId, $target, null);

                if($target < $countStatistic) 
                {
                    $newBenchmark = round($listPassMajor[$target - 1]["apply_grade"], 2);
                } 
                else 
                {
                    $newBenchmark = round($listPassMajor[$countStatistic - 1]["apply_grade"], 2);
                }
            } 
            else 
            {
                $listPassMajor = $statisticService->listStatisticEnrollment($majorId, null, $newBenchmark);
            }
            $isUpdate = $statisticService->updateNewBenchmark($majorId, $newBenchmark);

            $clearOldStudentPass = $statisticService->clearOldStudentPass($majorId);

            foreach($listPassMajor as $key => $student) 
            {
                $updateStudent = $statisticService->updateStudentPass($student['userId'], $majorId, $student['expectation_order']);
            }
            
            $infor = array('listPassMajor' => $listPassMajor, 
                           'inforMajorEnrollment' => $inforMajorEnrollment,
                           'countStatistic' => $countStatistic,
                           'newBenchmark' => round($newBenchmark, 2));
            $this->load->view('admin/listPass', $infor);
            $this->load->view('base/footer');
        }

        public function changeTarget($majorId) 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');

            $statisticService = $this->load->service('StatisticService');
            $inforMajorEnrollment = $statisticService->inforMajorEnrollment($majorId);
            $countStatistic = $statisticService->countStatistic($majorId);
            
            $infor = array('inforMajorEnrollment' => $inforMajorEnrollment,
                           'countStatistic' => $countStatistic);
            $this->load->view('admin/prepareToSetNewTarget', $infor);
            $this->load->view('base/footer');
            $this->load->view('base/header');
        }

        public function setNewBenchmarkByHand($majorId) 
        {
            $newBenchmark = $_POST['newBenchmark'];
            
            $this->confirmToSetNewBenchmark($majorId, $newBenchmark);
        }

        public function setNewTargetByHand($majorId) 
        {
            $newTarget = $_POST['newTarget'];

            $majorService = $this->load->service('MajorService');
            $setNewTarget = $majorService->setNewTarget($majorId, $newTarget);

            $this->listStatisticEnrollment($majorId);
            
        }

        public function viewListPass($majorId) 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            
            $statisticService = $this->load->service('StatisticService');
            $inforMajorEnrollment = $statisticService->inforMajorEnrollment($majorId);
            $countStatistic = $statisticService->countStatistic($majorId);
            $target = $inforMajorEnrollment[0]['target'];

            $listPassMajor = $statisticService->listPassMajor($majorId);
            
            $majorService = $this->load->service('MajorService');
            $majorInfo = $majorService->searchMajor($majorId);
            $curBenchmark = $majorInfo[0]['new_benchmark'];
            
            $infor = array('listPassMajor' => $listPassMajor, 
                           'inforMajorEnrollment' => $inforMajorEnrollment,
                           'countStatistic' => $countStatistic,
                           'newBenchmark' => $curBenchmark);
            $this->load->view('admin/listPass', $infor);
            $this->load->view('base/footer');
        }
    }
?>
