<?php

//Message de création de profil
if (isset($_SESSION['success_message'])) {
    echo '<script>alert("' . $_SESSION['success_message'] . '")</script>';
    unset($_SESSION['success_message']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    echo '<pre>';
    // Check if 'username' key is set before accessing it
    if (isset($_POST['email'])) {
        print_r($_POST['email']);
    } else {
        echo 'Username not set in the POST data.';
    }
    echo '</pre>';
}
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
