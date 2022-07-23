<?php
    class StatisticService extends DService 
    {
        public function __construct() 
        {
            parent::__construct();
        }

        public function statistic($table, $userId) 
        {
            $query = "SELECT * FROM $table WHERE userId = $userId ORDER BY statistic_order ASC";
            return $this->model->select($query);
        }

        public function listStatisticEnrollment($majorId, $target, $newBenchmark) 
        {
            $sumBlock = $this->getBlock($majorId);

            if($target != null) 
            {
                $query = "SELECT user.userId, user.fullname, user.username, user.sex, 
                          user.email, user.date_of_birth, " . $sumBlock . " AS apply_grade, user.phone_number,
                          expectation.expectation_order, university.university_name, major.major_name, major.majorId,
                          major.old_benchmark, major.target
                          FROM expectation join major ON 
                                    expectation.majorId = major.majorId 
                                        join university ON 
                                    major.universityId = university.universityId 
                                        join user ON 
                                    expectation.userId = user.userId
                          WHERE (user.id_expectation_pass IS NULL OR 
                          expectation.expectation_order < user.order_expectation_pass) AND " .$sumBlock. ">0 
                          AND major.majorId=:majorId ORDER BY " . $sumBlock . " DESC LIMIT $target";
                $data = array(
                    ':majorId' => $majorId,
                );
            } 
            else if($newBenchmark != null) 
            {
                $query = "SELECT user.userId, user.fullname, user.username, user.sex, user.email,
                          user.date_of_birth, " . $sumBlock . " 
                          AS apply_grade, user.phone_number,
                          expectation.expectation_order, university.university_name, major.major_name, major.majorId,
                          major.old_benchmark, major.target
                          FROM expectation join major ON 
                                    expectation.majorId = major.majorId 
                                           join university ON 
                                    major.universityId = university.universityId 
                                           join user ON 
                                    expectation.userId = user.userId
                          WHERE (user.id_expectation_pass IS NULL OR expectation.expectation_order < user.order_expectation_pass)
                          AND " .$sumBlock. ">0 
                          AND major.majorId = :majorId AND ". $sumBlock . ">=" . $newBenchmark . " ORDER BY " . $sumBlock . " DESC";
                
                $data = array(
                    // ':newBenchmark' => $newBenchmark,
                    ':majorId' => $majorId,
                );
            } 
            else if ($target == null && $newBenchmark == null)
            {
                $query = "SELECT user.userId, user.fullname, user.username, user.sex, user.email, 
                          user.date_of_birth, " . $sumBlock . " 
                          AS apply_grade, user.phone_number,
                          expectation.expectation_order, university.university_name, major.major_name, major.majorId,
                          major.old_benchmark, major.target
                          FROM expectation join major ON 
                                    expectation.majorId = major.majorId 
                                           join university ON 
                                    major.universityId = university.universityId 
                                           join user ON 
                                    expectation.userId = user.userId
                          WHERE (user.id_expectation_pass IS NULL OR expectation.expectation_order < user.order_expectation_pass)
                          AND " .$sumBlock. ">0 
                          AND major.majorId=:majorId ORDER BY " . $sumBlock . " DESC";

                $data = array(
                    ':majorId' => $majorId,
                );
            }
            return $this->model->select($query, $data);
        }

        public function countStatistic($majorId) 
        {
            $sumBlock = $this->getBlock($majorId);
            $query = "SELECT user.userId FROM expectation join major ON 
                                            expectation.majorId = major.majorId 
                                                join university ON 
                                            major.universityId = university.universityId 
                                                join user ON 
                                            expectation.userId = user.userId
            WHERE (user.id_expectation_pass IS NULL OR expectation.expectation_order < user.id_expectation_pass) 
            AND expectation.majorId=:majorId AND " .$sumBlock. ">0 ";

            $data = array(
                ':majorId' => $majorId,
            );
            return count($this->model->select($query, $data));
        }

        public function inforMajorEnrollment($majorId) 
        {
            $query = "SELECT university.university_name, major.major_name, major.majorId, major.block,
                      major.old_benchmark, major.target, major.new_benchmark
                      FROM major join university ON 
                                major.universityId = university.universityId
                      WHERE major.majorId=:majorId";
            
            $data = array(':majorId' => $majorId);
            return $this->model->select($query, $data);
        }
        
        public function listPassMajor($majorId) 
        {
            $sumBlock = $this->getBlock($majorId);
            $query = "SELECT user.userId, user.fullname, user.username, user.sex, user.email, 
                          user.date_of_birth, " . $sumBlock . " AS apply_grade, user.phone_number,
                          expectation.expectation_order, university.university_name, major.major_name, major.majorId,
                          major.old_benchmark, major.target
                          FROM expectation join major ON 
                                    expectation.majorId = major.majorId 
                                           join university ON 
                                    major.universityId = university.universityId 
                                           join user ON 
                                    expectation.userId = user.userId
                          WHERE major.majorId = :majorId AND ". $sumBlock . ">= major.new_benchmark
                          ORDER BY " . $sumBlock . " DESC";
                
                $data = array(':majorId' => $majorId);

            return $this->model->select($query, $data);
        }

        public function updateNewBenchmark($majorId, $newBenchmark) 
        {
            $table = "major";
            $data = array('new_benchmark' => $newBenchmark);
            $cond = "major.majorId = '$majorId'";
            return $this->model->update($table, $data, $cond);
        }

        public function clearOldStudentPass($majorId) 
        {
            $table = "user";
            $data = array('id_expectation_pass' => NULL,
                            'order_expectation_pass' => NULL);
            $cond = "user.id_expectation_pass = '$majorId'";
            return $this->model->update($table, $data, $cond);
        }

        public function updateStudentPass($userId, $majorId, $orderId) 
        {
            $table = "user";
            $data = array('id_expectation_pass' => $majorId,
                        'order_expectation_pass' => $orderId);
            $cond = "user.userId = '$userId'";
            return $this->model->update($table, $data, $cond);
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

            if (isset($GLOBALS['BlockConfig'][$blockMajor])) {
                // set query with block
                return "(user.".$GLOBALS['BlockConfig'][$blockMajor]['first'].
                        " + user.".$GLOBALS['BlockConfig'][$blockMajor]['second'].
                        " + user.".$GLOBALS['BlockConfig'][$blockMajor]['third'].")";
            } else {
                return "";
            }
        }

        public function majorById($table, $id) 
        {
            $query = "SELECT * FROM $table WHERE majorId=:id";
            $data = array(':id' => $id);
            return $this->model->select($query, $data);
        }

        public function insertStatistic($table, $data) 
        {
            return $this->model->insert($table, $data);
        }

        public function updateStatistic($table, $data, $cond) 
        {
            return $this->model->update($table, $data, $cond);
        }
        
        public function deleteStatistic($majorId, $userId)
        {
            return $this->model->delete($majorId, $userId);
        }

        public function deleteAllStatistic($majorId, $userId) 
        {
            return $this->model->deleteAll($majorId, $userId);
        }
    }
?>