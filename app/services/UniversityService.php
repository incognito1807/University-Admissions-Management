<?php
    class UniversityService extends DService 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function university($table) 
        {
            $query = "SELECT * FROM $table";
            return $this->model->select($query);
        }

        //list_university
        public function listUniversity() 
        {
            $query = "SELECT * FROM university ORDER BY university.universityId ASC";
            return $this->model->select($query);
        }

        //infor_uni
        public function inforUniversity($universityId) 
        {
            $query = "SELECT * FROM university WHERE university.universityId = '$universityId'";
            return $this->model->select($query);
        }

        public function listMajorUniversity($universityId) 
        {
            $query = "SELECT * FROM university join major ON university.universityId = major.universityId 
                      WHERE university.universityId = '$universityId'";
            return $this->model->select($query);
        }
        
        public function searchUniversity($university_name) 
        {
            $query = "SELECT * FROM university WHERE university.university_name LIKE '%$university_name%'
            OR university.universityId LIKE '%$university_name%'";
            return $this->model->select($query);
        }
    }
?>