<?php
namespace slice\src\models\classes;
use slice\src\models\classes\Ingredients;

class Produit extends Ingredient{
    private $_id;
    private $_nom;
    private $_description;
    private $_prix;
    private $_image;
    private $_ingredients = [];

    public function __construct($id, $nom, $description, $image, $prix) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_description = $description;
        $this->_image = $image;
        $this->_prix = $prix;
        $this->_ingredients = [];
    }

    public function getId() {
        return $this->_id;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }

    public function getImage() {
        return $this->_image;
    }

    public function setImage($image) {
        $this->_image = $image;
    }

    public function getPrix() {
        return $this->_prix;
    }

    public function setPrix($prix) {
        $this->_prix = $prix;
    }

    public function getIngredients() {
        return $this->_ingredients;
    }

    public function setIngredients($ingredients) {
        $this->_ingredients = $ingredients;
    }

    public function addIngredient(Ingredient $ingredient) {
        $this->_ingredients[] = $ingredient;
    }

    // public function addIngredients(array $ingredientsData) {
    //     foreach ($ingredientsData as $ingredientData) {
    //         $ingredient = new Ingredient(
    //             $ingredientData['id'],
    //             $ingredientData['nom'],
    //             $ingredientData['calories'],
    //             $ingredientData['poids']
    //         );
    //         $this->_ingredients[] = $ingredient;
    //     }
    // }
}