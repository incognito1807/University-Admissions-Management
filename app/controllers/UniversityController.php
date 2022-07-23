<?php
    class UniversityController extends DController 
    {
        public $university = array();
        public $universityById = array();
        public $mess = array();
        public function __construct() 
        {
            parent::__construct();
        }

        public function index() 
        {
            $this->university();
        }

        public function university() 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $this->load->view('base/university/listUniversity');
            $this->load->view('base/footer');
        }

        //list_uni
        public function listUniversity() 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $universityService = $this->load->service('UniversityService');
            $university = $universityService->listUniversity();
            $this->load->view('base/university/listUniversity', $university);
            $this->load->view('base/footer');
        }

        //infor_uni
        public function inforUniversity($universityId) 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $universityService = $this->load->service('UniversityService');
            $university = $universityService->inforUniversity($universityId);
            $this->load->view('base/university/inforUniversity', $university);
            $this->load->view('base/footer');
        }

        public function listMajorUniversity($universityId) 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $universityService = $this->load->service('UniversityService');
            $university = $universityService->listMajorUniversity($universityId);
            $this->load->view('base/university/listMajorUniversity', $university);
            $this->load->view('base/footer');
        }

        public function searchUniversity() 
        {
            $this->load->view('base/header');
            $this->load->view('base/menu');
            $university_name = $_POST['search_uni'];
            $universityService = $this->load->service('UniversityService');
            $university = $universityService->searchUniversity($university_name);
            $this->load->view('base/university/searchUniversity', $university);
            $this->load->view('base/footer');
        }
    }
?>
