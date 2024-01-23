<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slice</title>
    <link rel="stylesheet" href="assets/style/test.css">
</head>
<body>
    <header>
            <div>
                <img class="logo" src="assets/src/slice.png" alt="logo">
            </div>
            <navbar class="navbar">
                <ul class="navbar">
                    <?php if (!empty($_SESSION)){
                        if ($_SESSION['email']['password'] == 'admin'){
                            ?>
                    <li><a href="#">Administration</a></li>
                    <?php }} ?>
                    <li><a href="#">
                        <?php 
                        if (!empty($_SESSION['name'])){
                            echo $_SESSION['name'];
                        }
                        else{
                            echo 'Customer';
                        } ?></a></li>
                    <li><a href="#">Nous contacter</a></li>
                </ul>
                <img src="assets/src/gmail.png" class="compte" alt="compte">
            </navbar>
            
    </header>
    <hr/>
    <main>
        <!-- <?php if (!empty($_SESSION)){}
            // $_SESSION['name']['path'] ?> --> Faire la fonction path pour les differents modeles
        <section class="menu">
            <div class="card">
                <h4><b>John Doe</b></h4>
                <img src="assets/src/pizza_menu.jpg" alt="Avatar" style="width:100%">
                <div class="container">
                    <p>Architect & Engineer</p>
                </div>
            </div>
        </section>
        
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