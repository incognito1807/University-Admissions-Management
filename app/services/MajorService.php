<?php
    class MajorService extends DService 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function searchMajor($majorName) 
        {
            $query = "SELECT * FROM major join university ON major.universityId = university.universityId
                      WHERE major.major_name LIKE '%$majorName%' OR major.majorId LIKE '%$majorName%' ORDER BY major.old_benchmark DESC";
            return $this->model->select($query);
        }

        public function setNewTarget($majorId, $newTarget) 
        {
            $table = "major";
            $data = array('target' => $newTarget);
            $cond = "major.majorId = '$majorId'";
            return $this->model->update($table, $data, $cond);
        }
    }
?>