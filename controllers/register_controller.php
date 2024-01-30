<?php
if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $stmt = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';
    
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $data = $bdd->prepare($stmt);

    $data->bindParam(':username', $_POST['username']);
    $data->bindParam(':email', $_POST['email']);
    $data->bindParam(':password', $hashedPassword);
    $data->execute();

    $_SESSION['success_message'] = 'Votre profil a été créé avec succès. Connectez-vous maintenant!';
    header('location : ?page=login');
    exit();
}
require "views/register.php";
?>