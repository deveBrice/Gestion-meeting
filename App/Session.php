<?php 
   class Session {

       public static $instanceSession;

       public static function getInstanceSession()
       {
           if(!self::$instanceSession) {
            self::$instanceSession = new Session();
           }
         return self::$instanceSession;
       }

       public function __construct()
       {
           session_start();
       }

       public function setFlash($key, $message)
       {
        $_SESSION['flash'][$key] = $message;
       }

       public function getHasFlashes()
       {
           return isset($_SESSION['flash']);
       }

       public function getAllFlashes()
       {
           $flash = $_SESSION['flash'];
           unset($_SESSION['flash']);
           return $flash;
       }
   }

?>