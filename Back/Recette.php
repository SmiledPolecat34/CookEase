<?php

class Categorie {
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

class RecetteIngredient {
    private $recette_id;
    private $ingredient_id;
    private $quantity;

    public function getRecetteId() {
        return $this->recette_id;
    }

    public function getIngredientId() {
        return $this->ingredient_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setRecetteId($recette_id) {
        $this->recette_id = $recette_id;
    }

    public function setIngredientId($ingredient_id) {
        $this->ingredient_id = $ingredient_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}

class Recette {
    private $id;
    private $name;
    private $image_url;
    private $difficulty;
    private $preparation_time;
    private $utensils;
    private $quantity;
    private $category_id;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getImageUrl() {
        return $this->image_url;
    }

    public function getDifficulty() {
        return $this->difficulty;
    }

    public function getPreparationTime() {
        return $this->preparation_time;
    }

    public function getUtensils() {
        return $this->utensils;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    public function setDifficulty($difficulty) {
        $this->difficulty = $difficulty;
    }

    public function setPreparationTime($preparation_time) {
        $this->preparation_time = $preparation_time;
    }

    public function setUtensils($utensils) {
        $this->utensils = $utensils;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
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
        $requete->bindValue(':image_url', $recette->getImageUrl());
        $requete->bindValue(':difficulty', $recette->getDifficulty());
        $requete->bindValue(':preparation_time', $recette->getPreparationTime());
        $requete->bindValue(':utensils', $recette->getUtensils());
        $requete->bindValue(':quantity', $recette->getQuantity());
        $requete->bindValue(':category_id', $recette->getCategoryId());
        $requete->execute();
        $recette->setId($this->pdo->lastInsertId());
    }

    public function updateRecipe($recette) {
        $requete = $this->pdo->prepare("UPDATE recettes SET name=:name, image_url=:image_url, difficulty=:difficulty, preparation_time=:preparation_time, utensils=:utensils, quantity=:quantity, category_id=:category_id WHERE id=:id");
        $requete->bindValue(':id', $recette->getId());
        $requete->bindValue(':name', $recette->getName());
        $requete->bindValue(':image_url', $recette->getImageUrl());
        $requete->bindValue(':difficulty', $recette->getDifficulty());
        $requete->bindValue(':preparation_time', $recette->getPreparationTime());
        $requete->bindValue(':utensils', $recette->getUtensils());
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
}

?>