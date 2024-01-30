<?php
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON depuis le corps de la requête
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    if ($data !== null) {
        // Afficher le nom et le prix du produit ajouté au panier
        $nom = $data['nom'];
        $prix = $data['prix'];
    } else {
        echo "Erreur lors de la lecture des données JSON.";
    }
} else {
    echo "Méthode non autorisée.";
}

include 'views/basket.php';