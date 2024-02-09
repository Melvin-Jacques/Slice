<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slice</title>
    <link rel="stylesheet" href="public/assets/styles/style.css">
</head>

<body>
    <header>
        <div>
            <a href="?route=home"><img class="logo" src="public/assets/images/slice.png" alt="logo"></a>
        </div>
        <navbar class="navbar">
            <ul class="navbar">
                <?php if (!empty($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin']) {?>
                        <li class="dropdown">
                            <a href="#" class="dropbtn">Administration</a>
                            <div class="dropdown-content">
                                <a href="?page=error" style="color:crimson">Liste Commandes</a>
                                <a href="?page=error" style="color: crimson;">Bénéfices</a>
                                <a href="?page=error" style="color: crimson;">Menu</a>
                            </div>
                        </li>
                <?php } ?>
                <li class="dropdown">
                    <a href="#" class="dropbtn">
                        <?php
                        if (!empty($_SESSION['user']['username'] )) {
                            echo $_SESSION['user']['username'];
                        } else {
                            echo 'Customer';
                        } ?>
                    </a>
                    <div class="dropdown-content">
                        <a href="?page=commandes" style="color: crimson;">Commandes</a>
                        <a href="?page=messages" style="color: crimson;">Messages</a>
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <a href="?page=home&logout=1">Déconnexion</a>
                        <?php } else {?>
                            <a href="?page=login">Connexion</a>
                        <?php } ?>
                    </div>
                </li>
                <li><a href="?page=error" style='color:crimson;'>Nous contacter</a></li>
                <li>
                    <p class="panierCount">0</p>
                </li>
                <li><a href="?page=basket"><img class="panierlogo" src="public/assets/images/shoppinglogo.png" alt="shopping-logo.png"></a></li>
            </ul>
            <a href="<?php if(empty($_SESSION['user']['username'])){
                echo '?page=login';
            } else {
                echo '?page=home';
            } ?>"><img src="public/assets/images/gmail.png" class="compte" alt="compte"></a>
        </navbar>
    </header>
    <hr class="headerhr" />

    <main>
        <?php require "src/controllers/" . $route . "_controller.php"; ?>
    </main>

    <footer>
        <div>
            <hr/>
            <p>Copyright © 2024-2024 Melvin Jacques. All right reserved</p>
        </div>
    </footer>
</body>

</html