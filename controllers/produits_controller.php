<?php
if (isset($_REQUEST)) {
$query = "SELECT * FROM produits";
$response = $bdd->prepare($query);
$response->execute();
$produitdatas = $response->fetchAll();
}
// Prendre les valeur name, description et price de produits (grams et calories calculés selon les ingrédients ??? pas dans la bdd mais ici dans le controller

include 'views/produits.php';
