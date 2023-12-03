<?php


class Recette {
    private $id;
    private $name;
    private $image_url;
    private $difficulty;
    private $preparation_time;
    private $utensils;
    private $quantity;
    private $category_id;
    private $ingredient_list;
    private $steps;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getImage() {
        return $this->image_url;
    }

    public function getDifficulty() {
        return $this->difficulty;
    }

    public function getPreparationTime() {
        return $this->preparation_time;
    }

    public function getUstensils() {
        return $this->utensils;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getIngredientList() {
        return $this->ingredient_list;
    }

    public function getSteps() {
        return $this->steps;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setImage($image_url) {
        if (!empty($image_url)) {
            if (filter_var($image_url, FILTER_VALIDATE_URL)) {
                // Si c'est une URL valide, stocke directement l'URL
                $this->image_url = $image_url;
            } 
           
        } else {
            // Gère le cas où aucune URL n'est fournie
            $this->image_url = null;
        }
    }
    
    

    public function setDifficulty($difficulty) {
        $this->difficulty = $difficulty;
    }

    public function setPreparationTime($preparation_time) {
        $this->preparation_time = $preparation_time;
    }

    public function setUstensils($ustensils) {
        $this->ustensils = $ustensils;
    }    

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    public function setIngredientList($ingredient_list) {
        $this->ingredient_list = $ingredient_list;
    }

    public function setSteps($steps) {
        $this->steps = is_string($steps) ? json_decode($steps, true) : $steps;
    }
    
}

class RecetteManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addRecipe($recette) {
        $name = $recette->getName();
        $image_url = $recette->getImage();
        $difficulty = $recette->getDifficulty();
        $preparation_time = $recette->getPreparationTime();
        $utensils = $recette->getUstensils();
        $quantity = $recette->getQuantity();
        $category_id = $recette->getCategoryId();
        $steps = $recette->getSteps();
    
        // Prepare the SQL statement
        $stmt = $this->pdo->prepare("
            INSERT INTO recettes (name, image_url, difficulty, preparation_time, utensils, quantity, category_id, steps)
            VALUES (:name, :image_url, :difficulty, :preparation_time, :utensils, :quantity, :category_id, :steps)
        ");
    
        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':difficulty', $difficulty);
        $stmt->bindParam(':preparation_time', $preparation_time);
        $stmt->bindParam(':utensils', $utensils);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':steps', $stepsAsString);
    
        // Execute the statement
        $stmt->execute();
    
        // Retrieve the last inserted ID
        $recipe_id = $this->pdo->lastInsertId();
    
        // Add ingredients to the association table
        foreach ($recette->getIngredientList() as $ingredient_id) {
            $stmt = $this->pdo->prepare("
                INSERT INTO recette_ingredient (recette_id, ingredient_id)
                VALUES (:recette_id, :ingredient_id)
            ");
            $stmt->bindParam(':recette_id', $recipe_id);
            $stmt->bindParam(':ingredient_id', $ingredient_id);
            $stmt->execute();
        }
    }
    

    public function getAllRecipes() {
        $requete = $this->pdo->prepare("SELECT * FROM recettes");
        $requete->execute();
        $recettes = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $recettes;
    }
    
    public function searchRecipes($search) {
        $requete = $this->pdo->prepare("SELECT * FROM recettes WHERE name LIKE :search");
        $requete->bindValue(':search', '%' . $search . '%');
        $requete->execute();
        $recettes = $requete->fetchAll(PDO::FETCH_ASSOC);

        return $recettes;
    }

}
    

?>

