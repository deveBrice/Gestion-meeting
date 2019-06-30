<?php
  class Database {
      use \PDO;
      private $pdo;

      public function __construct($db_host='192.168.99.100:5100', $db_name, $db_user, $db_pass)
      {
          $this->pdo = new PDO("mysql:dbname=$db_name; host=$db_host", $db_user, $db_pass);
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
          $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      }

      public function query($statement, $params = false)
      {
          if($params) 
          {
            $req = $this->pdo->prepare($statement);
            $req->execute($params); 
          } else {
              $req = $this->pdo->query($statement);
          }
       
        return $req;
      }
  }
?>