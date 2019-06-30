<?php

class DatabaseStatic {
   
    public static $db = null;

    public static function getDatabase() {
        if(!self::$db){
            self::$db =  new Database('','Gestion Meetings', 'brice', 'root');
        }
      return self::$db;
    }

    public static function getRedirect($page)
    {
        header("Location: $page");
        exit();
    }

    public static function getAuth()
    {
       return new Authentification(Session::getInstanceSession(), ["restriction_msg' => 'Vous n\'avez pas accès"]);
    }
}
  
?>