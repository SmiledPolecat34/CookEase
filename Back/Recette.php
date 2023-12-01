<?php
// Recette.php

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
            } else {
                // Si le chemin local existe, considère-le comme une URL valide
                if (file_exists($image_url)) {
                    $this->image_url = $image_url;
                } else {
                    // Si le chemin local n'existe pas, traite-le comme une valeur nulle
                    $this->image_url = null;
                }
            }
        } else {
            // Gère le cas où aucune URL n'est fournie
            $this->image_url = null; // Ou définit un autre comportement par défaut si nécessaire
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
}

class RecetteManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addRecipe($recette) {
        $requete = $this->pdo->prepare("INSERT INTO recettes (name, image_url, difficulty, preparation_time, utensils, quantity, category_id) VALUES (:name, :image_url, :difficulty, :preparation_time, :utensils, :quantity, :category_id)");
        $requete->bindValue(':name', $recette->getName());
        $requete->bindValue(':image_url', $recette->getImage());
        $requete->bindValue(':difficulty', $recette->getDifficulty());
        $requete->bindValue(':preparation_time', $recette->getPreparationTime());
        $requete->bindValue(':utensils', $recette->getUstensils());
        $requete->bindValue(':quantity', $recette->getQuantity());
        $requete->bindValue(':category_id', $recette->getCategoryId());
        $requete->execute();
        $recette->setId($this->pdo->lastInsertId());
        $requete = $this->pdo->prepare("INSERT INTO recette_ingredient (recette_id, ingredient_id) VALUES (:recette_id, :ingredient_id)");
        foreach ($recette->getIngredientList() as $ingredient_id) {
            $requete->bindValue(':recette_id', $recette->getId());
            $requete->bindValue(':ingredient_id', $ingredient_id);
            $requete->execute();
        }
    }

    public function updateRecipe($recette) {
        $requete = $this->pdo->prepare("UPDATE recettes SET name=:name, image_url=:image_url, difficulty=:difficulty, preparation_time=:preparation_time, utensils=:utensils, quantity=:quantity, category_id=:category_id WHERE id=:id");
        $requete->bindValue(':id', $recette->getId());
        $requete->bindValue(':name', $recette->getName());
        $requete->bindValue(':image_url', $recette->getImage());
        $requete->bindValue(':difficulty', $recette->getDifficulty());
        $requete->bindValue(':preparation_time', $recette->getPreparationTime());
        $requete->bindValue(':utensils', $recette->getUstensils());
        $requete->bindValue(':quantity', $recette->getQuantity());
        $requete->bindValue(':category_id', $recette->getCategoryId());
        $requete->execute();
    }

    public function deleteRecipe($recette) {
        $requete = $this->pdo->prepare("DELETE FROM recettes WHERE id=:id");
        $requete->bindValue(':id', $recette->getId());
        $requete->execute();
    }

    public function getRecipesByCategory($category_id) {
        $requete = $this->pdo->prepare("SELECT * FROM recettes WHERE category_id=:category_id");
        $requete->bindValue(':category_id', $category_id);
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_CLASS, 'Recette');
        return $resultats;
    }

    public function getAllRecipes() {
        $requete = $this->pdo->prepare("SELECT * FROM recettes");
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_CLASS, 'Recette');
        return $resultats;
    }
}

?>