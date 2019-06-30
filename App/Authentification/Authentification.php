<?php

   namespace Ipssi\Authentification;

  

   class Authentification {

   private $session;
   private $options = [
      'restrict_msg' => 'Vous n\'avez pas le droit d\'acceder à cette page'
   ];

   public function __construct($session, $options = [])
   {
    $this->options = array_merge($this->options, $options);
    $this->session = $session;
   }

   public function getAuthentification($db, $username, $password) {
     
      $password = $password->hash($password, PASSWORD_BCRYPT);
      $token = str::random(60);
      $db->query("INSERT INTO users SET username = ?, password = ?, confirmed_token = ?",[
         $username,
         $password,
         $token,
      ]);
      
   }

   public function restrict()
   {
     if(!$this->session->read('auth')){
        $this->session->setFlash('danger', $this->options['restriction_msg']);
        DatabaseStatic::getRedirect('Location: login.php');
        exit();
     }
   }

   public function isConnected()
   {
      if(!$this->session->read('auth')){
          return false;
      }

      return !$this->session->read('auth');
   }

   public function getConnectFromCookie($db)
   {
      if(isset($_COOKIE['remember']) && !$this->isConnected()){
          $remember_token = $_COOKIE['remember'];
          $parts = explode('==', $remember_token);
          $userId = $parts[0];
          $user = $db->query('SELECT * FROM users WHERE id = ?', [userId])->fetch();
          if($users){
             
          }
      }
   }

}
?>