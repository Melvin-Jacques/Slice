<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slice</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <header>
            <div>
                <a href="?route=home"><img class="logo" src="assets/src/slice.png" alt="logo"></a>
            </div>
            <navbar class="navbar">
                <ul class="navbar">
                    <?php if (!empty($_SESSION)){
                        if ($_SESSION['user']['is_admin']){
                            ?>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Administration</a>
                            <div class="dropdown-content">
                                <a href="#">Liste Commandes</a>
                                <a href="#">Bénéfices</a>
                                <a href="#">Menu</a>
                            </div>
                    </li>
                    <?php }} ?>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">
                        <?php 
                        if (!empty($_SESSION)){
                            echo $_SESSION['user']['username'];
                        }
                        else{
                            echo 'Customer';
                        } ?>
                        </a>
                            <div class="dropdown-content">
                                <a href="?page=compte">Compte</a>
                                <a href="?page=commandes">Commandes</a>
                                <a href="?page=messages">Messages</a>
                            </div>
                        </li>
                    <li><a href="#">Nous contacter</a></li>
                </ul>
                <a href="?page=login"><img src="assets/src/gmail.png" class="compte" alt="compte"></a>
            </navbar>
            
    </header>
    <hr class="headerhr"/>
    <main>
        <?php require "controllers/". $route. "_controller.php"; ?>
    </main>
    <footer>
        <div>
            <p>Ceci est le footer :)</p>
            <p>Normalement il s'étend vers le bas</p>
            <p>Nickel</p>
        </div>
    </footer>
</body>
</html>