<?php
    class MajorController extends DController 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function searchMajor() 
        {   
            $this->load->view('base/header'); 
            $this->load->view('base/menu');
            if(isset($_POST['search_major'])) {
                $major_name = $_POST['search_major'];
                $majorService = $this->load->service('MajorService');  
                $major = $majorService->searchMajor($major_name); 
            } 
            else 
            {
                $major = [];
            }
            $this->load->view('base/major/listMajor', $major);
            $this->load->view('base/footer'); 
        }
    }
?>
