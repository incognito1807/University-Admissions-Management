<?php
    class Session 
    {
        public static function init() 
        {
            session_start();
        }

        public static function set($key, $value) 
        {
            $_SESSION[$key] = $value;
        }

        public static function get($key) 
        {
            if(isset($_SESSION[$key])) 
            {
                return $_SESSION[$key];
            } 
            else 
            {
                return false;
            }
        }

        public static function checkSession() 
        {
            self::init();
            if(self::get('login') == false) 
            {
                self::destroy();
                header("Location:".BASE_PATH."/LoginController");
            } 
            else 
            {
                
            }
        }

        public static function destroy()
        {
            session_destroy();
        }

        public function unset($key) 
        {
            session_unset($key);
        }
    }
?>