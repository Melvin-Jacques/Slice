<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST['username'])) {
        echo "<p style='color: red;'>The username is empty<p>";
    }
    if (strlen($_POST['username']) > 16) {
        echo "<p style='color: red;'>The username is too long (16 caracters max !)<p>";
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

    $check_email = $bdd->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
    $check_email->bindParam(':email', $_POST['email']);
    $check_email->execute();
    $email_exists = $check_email->fetch();

    $check_email->execute();

    if ($check_email) {
        $email_exists = $check_email->fetch();

        if ($email_exists['count'] > 0) {
            echo 'Cet email est déjà utilisé. Veuillez en choisir un autre.';
        } else {
            if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

                $stmt = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';

                $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $infocheck = $bdd->prepare($stmt);

                $infocheck->bindParam(':username', $_POST['username']);
                $infocheck->bindParam(':email', $_POST['email']);
                $infocheck->bindParam(':password', $hashedPassword);
                $infocheck->execute();

                $_SESSION['success_message'] = 'Votre profil a été créé avec succès. Connectez-vous maintenant!';
                header('location: ?page=login');
                exit();
            }
        }
    } else {
        echo 'Error executing the email check query.';
    }
}


require "public/views/global/register.php";
