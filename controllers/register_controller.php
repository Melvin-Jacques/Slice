<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST['username'])) {
        echo "<p style='color: red;'>The name is empty<p>";
    }
    if (strlen($_POST['username']) > 16) {
        echo "<p style='color: red;'>The name is too long (16 caracters max !)<p>";
    }
    if (empty($_POST['email'])) {
        echo "<p style='color: red;'>The email is empty<p>";
    }
    if (empty($_POST['password'])) {
        echo "<p style='color: red;'>The password is empty<p>";
    }
    if (strlen($_POST['password']) < 8) {
        echo "<p style='color: red;'>The password is too short (8 caracters min !) <p>";
    }
    if ($_POST['password'] != $_POST['password_confirmation']) {
        echo "<p style='color: red;'>The passwords are not the same<p>";
    }

    $stmt = $bdd->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
    $stmt->execute(array($_POST['email']));
    if ($stmt->fetchColumn() == 0) {
        echo "p style='color: red;'>This email is already taken ! Choose another</p>";
    } else {
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
    }
}
require "views/register.php";
