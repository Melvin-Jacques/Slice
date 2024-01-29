<?php
// class Produit {
//     private $_id;
//     private $_nom;
//     private $_description;
//     private $_prix;
//     private $_image;
//     private $_ingredients = [];

//     public function __construct($id, $nom, $description, $prix, $image) {
//         $this->_id = $id;
//         $this->_nom = $nom;
//         $this->_description = $description;
//         $this->_prix = $prix;
//         $this->_image = $image;
//     }

//     public function getId() {
//         return $this->_id;
//     }

//     public function getNom() {
//         return $this->_nom;
//     }

//     public function getDescription() {
//         return $this->_description;
//     }

//     public function getPrix() {
//         return $this->_prix;
//     }

//     public function getImage() {
//         return $this->_image;
//     }

//     public function getIngredients() {
//         return $this->_ingredients;
//     }

//     public function addIngredient(Ingredient $ingredient) {
//         $this->_ingredients[] = $ingredient;
//     }

//     public function addIngredients(array $ingredientsData) {
//         foreach ($ingredientsData as $ingredientData) {
//             $ingredient = new Ingredient(
//                 $ingredientData['id'],
//                 $ingredientData['nom'],
//                 $ingredientData['calories'],
//                 $ingredientData['poids']
//             );
//             $this->ingredients[] = $ingredient;
//         }
//     }
// }
// class Ingredient {
//     private $_id;
//     private $_nom;
//     private $_calories;
//     private $_poids;

//     public function __construct($id, $nom, $calories, $poids) {
//         $this->_id = $id;
//         $this->_nom = $nom;
//         $this->_calories = $calories;
//         $this->_poids = $poids;
//     }

//     public function getId() {
//         return $this->_id;
//     }

//     public function getNom() {
//         return $this->_nom;
//     }

//     public function getCalories() {
//         return $this->_calories;
//     }

//     public function getPoids() {
//         return $this->_poids;
//     }
// }

if (isset($_REQUEST)) {
    $request = "SELECT produits.id AS produit_id, produits.name AS produit_nom, produits.description AS produit_description, produits.price AS produit_prix, produits.pic_name AS produit_image,
                 ingredients.id AS ingredient_id, ingredients.name AS ingredient_nom, ingredients.calories AS ingredient_calories, ingredients.weight AS ingredient_poids
          FROM produits
          LEFT JOIN ingredients_produits ON produits.id = ingredients_produits.produits_id
          LEFT JOIN ingredients ON ingredients_produits.ingredients_id = ingredients.id
          WHERE categories_id = :id";

    $statement = $bdd->prepare($request);
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $statement->execute([
            'id' => $_GET['id']
        ]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        header('location: ?page=error');
    }

    $produits = [];

    foreach ($result as $row) {
        $produitId = $row['produit_id'];

        if (!isset($produits[$produitId])) {
            $produits[$produitId] = [
                'id' => $produitId,
                'nom' => $row['produit_nom'],
                'description' => $row['produit_description'],
                'pic_name' => $row['produit_image'],
                'price' => $row['produit_prix'],
                'ingredients' => [],
            ];
        }

        if ($row['ingredient_id'] !== null) {
            $produits[$produitId]['ingredients'] = [
                'id' => $row['ingredient_id'],
                'nom' => $row['ingredient_nom'],
                'calories' => $row['ingredient_calories'],
                'poids' => $row['ingredient_poids'],
            ];
        }
    }
}
// Prendre les valeur name, description et price de produits (grams et calories calculés selon les ingrédients ??? pas dans la bdd mais ici dans le controller

include 'views/produits.php';
