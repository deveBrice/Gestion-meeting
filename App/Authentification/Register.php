<?php

   namespace Ipssi\Authentification;
   use Ipssi\Database\DatabaseStatic;
   use Ipssi\Core\Validator;

  require '../Core/Validator';

class Register {

   // $error = array();
    $db = DatabaseStatic::getDatabase();
    $validator = new Validator($_POST);
    
    $validator->isValid();
    $validator->getErrors();
    
    $validator->isAlpha('username', 'Votre username n\ai pas valide');
    if($validator->isValid()){
        $validator->isUsers('username','$db','Users', 'Votre username n\ai pas valide');
    }
    
    if($validator->isValid()){
        $validator->isConfimedPassword('password', 'votre mot de passe est invalid');
    }
    
    if($validator->isValid()){
        DatabaseStatic::getAuth()->getAuthentification($_POST['username'], $_POST['password']);
        $session->setFlash('sucess');
        

        DatabaseStatic::redirect('Location: Autentification.php');
       
        
    }

    
    //$_SESSION['flash']['sucess'];
}



?>