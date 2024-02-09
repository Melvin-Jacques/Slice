<?php
require_once './src/models/classes/ProduitManager.php';
use slice\src\models\classes\ProduitManager;
if (isset($_REQUEST)) {
    $request = "SELECT produits.id AS produit_id, produits.name AS produit_nom, produits.description AS produit_description, produits.price AS produit_prix, produits.pic_name AS produit_image,
                 ingredients.id AS ingredient_id, ingredients.name AS ingredient_nom, ingredients.calories_100g AS ingredient_calories, ingredients.weight AS ingredient_poids
          FROM produits
          LEFT JOIN ingredients_produits ON produits.id = ingredients_produits.produits_id
          LEFT JOIN ingredients ON ingredients_produits.ingredients_id = ingredients.id
          WHERE categories_id = :id AND is_displayed = 1";

    $statement = $bdd->prepare($request);
    if (isset($_GET['id']) && is_numeric($_GET['id'])){

        $categoryId = filter_var($_GET['id'], FILTER_VALIDATE_INT);

        if ($categoryId !== false && $categoryId > 0) {
            $statement->bindParam(':id', $categoryId, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            header('location: ?page=error');
            exit();
        }
    }
    else{
        header('location: ?page=error');
        exit();
    }
    $produitManager = new ProduitManager();
    $produits = $produitManager->creerProduits($result);
}

include 'public/views/global/produits.php';
