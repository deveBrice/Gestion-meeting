<?php 
  $auth = DatabaseStatic::getAuth();
  $db = DatabaseStatic::getDatabase();
  $auth->connectFromCookie($db);
?>