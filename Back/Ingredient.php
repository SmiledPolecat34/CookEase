<?php

class Ingredient {
    private $id;
    private $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

class IngredientManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Récupère les ingrédients d'une recette
    public function getIngredientsByRecipeId($recipe_id) {
        $sql = 'SELECT i.id, i.name FROM ingredients i INNER JOIN recette_ingredient ri ON i.id = ri.ingredient_id WHERE ri.recette_id = :recipe_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['recipe_id' => $recipe_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ingredient');
        $ingredients = $stmt->fetchAll();
        return $ingredients;
    }

    public function getAllIngredients() {
        $sql = 'SELECT * FROM ingredients';
        $stmt = $this->pdo->prepare($sql);  
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ingredient');
        $ingredients = $stmt->fetchAll();
        return $ingredients;
    }
}
    
?>

