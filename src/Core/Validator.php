<?php

   namespace Ipssi\Core;

   class Validator {

       private $data;
       private $errors = [];

       public function __construct($data)
       {
           $this->data = $data;
       }


       private function getIssetField($field)
       {
        if(!isset($this->data[$field])){
           return null;   
        }
         return $this->data[$field];
       }


       public function isAlpha($field, $errorMsg)
       {
         if(!preg_match('/^[a-zA-Z0-9_]+$/', $this->getIssetField($field))){
             $this->errors[$field] = $errorMsg;
         }
       }

       public function isUsers($field, $table, $db, $errorMsg)
       {
         $user = $db->query("SELECT id FROM $table WHERE $field = ?", [$this->getIssetField($field)])->fetch();
         if($user){
          $this->errors[$field] = $errorMsg;
         }
       }

       public function isConfirmedPassword($field, $errorMsg)
       {
         if(empty($this->getIssetField($field) || $this->getIssetField($field) != $this->getIssetField($field) . '_confirmed')){
          $this->errors[$field] = $errorMsg;
         }
       }

       public function isValid()
       {
          return empty($this->errors);
       }
   }
