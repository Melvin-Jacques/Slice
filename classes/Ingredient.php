<?php
namespace slice\classes;
class Ingredient {
     private $_id;
     private $_nom;
     private $_calories;
     private $_poids;
    
     public function __construct($id, $nom, $calories, $poids) {
         $this->_id = $id;
         $this->_nom = $nom;
         $this->_calories = $calories;
         $this->_poids = $poids;
     }
    
     public function getId() {
         return $this->_id;
     }
    
     public function getNom() {
         return $this->_nom;
     }
    
     public function getCalories() {
         return $this->_calories;
     }
    
     public function getPoids() {
         return $this->_poids;
     }
 }