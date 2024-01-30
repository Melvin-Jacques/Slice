<?php
session_start();
//session_destroy();
include 'controllers/connexion_bdd_controller.php';

require 'classes/Ingredient.php';
require 'classes/Produit.php';
require 'classes/ProduitManager.php';
// echo password_hash("user", PASSWORD_DEFAULT);
// pour un password


// Routeur
$availableRoutes=['home', 'admin', 'login', 'logout', 'register', 'basket','produits','commandes', 'error'];
$route = 'home';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}


require './views/layout.php';