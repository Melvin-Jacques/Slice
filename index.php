<?php

session_start();
include 'controllers/connexion_bdd_controller.php';

echo password_hash("user", PASSWORD_DEFAULT);


$availableRoutes=['home', 'admin', 'login', 'logout', 'register', 'basket','products','commandes'];

$route = 'home';

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}


require './views/layout.php';