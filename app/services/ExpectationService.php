<?php
    class ExpectationService extends DService 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function expectation($table, $userId) 
        {
            $query = "SELECT * FROM $table WHERE userId = $userId ORDER BY expectation_order ASC";
            return $this->model->select($query);
        }

        public function listExpectation($userId) 
        {
            $query = "SELECT expectation.expectation_order, expectation.majorId, university.universityId,
                      university.university_name, major.major_name, major.block, major.old_benchmark, 
                      major.new_benchmark, major.target, user.id_expectation_pass
                      FROM expectation join major ON expectation.majorId = major.majorId 
                      join university ON major.universityId = university.universityId 
                      join user ON expectation.userId = user.userId 
                      WHERE expectation.userId =:userId ORDER BY expectation.expectation_order ASC";
            $data = array(
                ':userId' => $userId,
            );
            return $this->model->select($query, $data);
        }

        public function checkGradeApply($userId, $majorId) 
        {
            $blockMajor = $this->getBlock($majorId);
            $query = "SELECT user.grade_maths, user.grade_literature, user.grade_english,
                      user.grade_physics, user.grade_chemistry, user.grade_biology,
                      user.grade_history, user.grade_geography, user.grade_civic_education
                      FROM user
                      WHERE user.userId =:userId";
            $data = array(
                ':userId' => $userId,
            );
            $gradeUsers = $this->model->select($query, $data);
            $gradeUser = $gradeUsers[0];
            
            if(!$gradeUser[$GLOBALS['BlockConfig'][$blockMajor]['first']] ||
               !$gradeUser[$GLOBALS['BlockConfig'][$blockMajor]['second']] ||
               !$gradeUser[$GLOBALS['BlockConfig'][$blockMajor]['third']]) 
            {
                return false;
            } 
            return true;
        } 
        
        public function getBlock($majorId) 
        {
            // get block
            $queryBlock = "SELECT major.block FROM major WHERE major.majorId=:majorId";
            $major = array(':majorId' => $majorId);
            $block = $this->model->select($queryBlock, $major);
            foreach($block as $key => $data) 
            {
                $blockMajor = $data['block'];
            }
            return $blockMajor;
        }

        public function getGradeList($userId) 
        {
            $query = "SELECT * from user WHERE user.userId = $userId";
            return $this->model->select($query);
        }

        public function insertExpectation($table, $data) 
        {
            return $this->model->insert($table, $data);
        }

        public function updateExpectation($table, $data, $cond) 
        {
            return $this->model->update($table, $data, $cond);
        }
        
        public function deleteExpectation($majorId, $userId) 
        {
            echo "<script>console.log('goi service db:' " . $majorId ." );</script>";
            return $this->model->delete($majorId, $userId);
        }

        public function deleteAllExpectation($majorId, $userId) 
        {
            return $this->model->deleteAll($majorId, $userId);
        }

        public function countExpectation($table, $userId) 
        {
            $query = "SELECT * FROM $table WHERE userId=?";
            return $this->model->count($query, $userId);
        }
    }
?>