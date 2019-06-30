<?php
namespace Ipssi;

use Ipssi\Database\DatabaseStatic;
use Ipssi\Core\Validator;
use Ipssi\Authentification\Authentification;

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    throw new Exception('Exec composer install');
}
require __DIR__.'/vendor/autoload.php';
 
//require "src/Validator.php";



?>





<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles.css">
</head>
    <body>
        <div class="jumbotron">
                <div class="row">
                   <div class="gestion-meeting-connexion">
                     <div class="titre">
                        <h1>Gestion des Meetings</h1>
                     </div>
                       <div class="auth">
                          <form action="/action_page.php">
                             <div class="form-group">
                               <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                       <div>
                   </div>
                </div>
            </div>
        </div>
    <body>
</html>