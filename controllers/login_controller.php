<?php
if(!empty($_POST['email']) && !empty($_POST['password'])){
    $query = "SELECT * FROM users WHERE email = :email ";
    $response = $bdd->prepare($query);
    $response->execute([
        ":email" => $_POST['email']
    ]);
    $data = $response->fetch();
    if($_POST['email'] == $data['email']  && password_verify($_POST['password'],$data['password'])){
        $_SESSION['user'] = $data;
        header('location: ?page=home');
        exit();
    }
    else{
        echo "<p style='color: red;'>Email ou mot de passe incorrect, veuillez réessayer</p>";
    }
}

include 'views/login.php';
