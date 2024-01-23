<?php
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $query = "SELECT * FROM users AS u WHERE u.email = :email AND u.password = :password";
    $response = $bdd->prepare($query);
    $response->execute([
        ":email" => $_POST['email'],
        ":password" => md5($_POST['password'])
    ]);
    $data = $response->fetch();
    if($_POST['email'] == $data['email']  && $_POST['password'] == $data['password']){
        header('location: index.php');
    }
    else{
        echo "<p style='color: red;'>Email ou mot de passe incorrect, veuillez réessayer</p>";
    }
}
