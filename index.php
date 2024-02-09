<?php
session_start();
//session_destroy();
include 'src/config/connexion_bdd_controller.php';

require 'src/models/classes/Ingredient.php';
require 'src/models/classes/Produit.php';
require 'src/models/classes/ProduitManager.php';
// echo password_hash("user", PASSWORD_DEFAULT);
// pour un password


// Routeur
$availableRoutes=['home', 'admin', 'login', 'logout', 'register', 'basket','produits','commandes', 'error','messages'];
$route = 'home';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
    $route = $_GET['page'];
}


require 'public/views/layout.php';