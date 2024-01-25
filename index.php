<?php

session_start();
include 'controllers/connexion_bdd_controller.php';

$availableRoutes=['home', 'admin', 'login', 'logout', 'register', 'basket','products','commandes'];

$routes = 'home';

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}


require './views/layout.php';