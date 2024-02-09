<?php
namespace slice\src\models\classes;
use slice\src\models\classes\Produit;
use slice\src\models\classes\Ingredient;
class ProduitManager{
    public static function creerProduits($donnees) {
        $produits = [];
        foreach ($donnees as $row) {
            $produitId = $row['produit_id'];
            if (!isset($produits[$produitId])) {
                $produits[$produitId] = new Produit(
                    $produitId,
                    $row['produit_nom'],
                    $row['produit_description'],
                    $row['produit_image'],
                    $row['produit_prix']
                );
            }

            if ($row['ingredient_id'] !== null) {
                $ingredient = new Ingredient(
                    $row['ingredient_id'],
                    $row['ingredient_nom'],
                    $row['ingredient_calories'],
                    $row['ingredient_poids']
                );
                $produits[$produitId]->addIngredient($ingredient);
            }
        }
        return $produits;
    }
}