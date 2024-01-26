<?php 
echo "redirection register ok";
if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $stmt = 'INSERT INTO users VALUES (:username, :email, :password) AS username, email, password';
    $stmt->$bdd->prepare($stmt);
}
require "views/register.php";