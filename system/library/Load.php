<?php
    class Load 
    {
        public function __construct() 
        {
            
        }
        public function view($filename, $data = false) 
        { 
            include './app/views/'.$filename.'.php';
        }
        public function service($filename) 
        {
            include './app/services/'.$filename.'.php';
            return new $filename();
        }
    }
?>