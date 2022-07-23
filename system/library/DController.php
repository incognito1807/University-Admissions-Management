<?php
    class DController 
    {
        protected $load = array();
        public function __construct() 
        {
            $this->load = new Load();

            $this->addBlock();
        }

        function addBlock() 
        {
            $GLOBALS['BlockConfig'] = array(
                    "A00" => array(
                        "first" => "grade_maths",
                        "second" => "grade_physics",
                        "third" => "grade_chemistry",
                    ),
                    "B00" => array(
                        "first" => "grade_maths",
                        "second" => "grade_chemistry",
                        "third" => "grade_biology",
                    ),
                    "C00" => array(
                        "first" => "grade_literature",
                        "second" => "grade_history",
                        "third" => "grade_geography",
                    ),
                    "D00" => array(
                        "first" => "grade_maths",
                        "second" => "grade_literature",
                        "third" => "grade_english",
                    ),
                    "D01" => array(
                        "first" => "grade_maths",
                        "second" => "grade_literature",
                        "third" => "grade_english",
                    ),
                    "A01" => array(
                        "first" => "grade_maths",
                        "second" => "grade_physics",
                        "third" => "grade_english",
                    )
                );
        }
    }
?>