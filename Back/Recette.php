<?php

require_once ('Serveur.php');
require_once ('Ingredients.php');

class Recette {
        
    private $id;
    private $nom;
    private $description;
    private $image;
    private $ingredients;
    private $etapes;
    private $pdo;
    
    public function __construct($nom, $description, $image, $ingredients, $etapes, $pdo) {
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
        $this->ingredients = $ingredients;
        $this->etapes = $etapes;
        $this->pdo = $pdo;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function getImage() {
        return $this->image;
    }
    
    public function getIngredients() {
        return $this->ingredients;
    }
    
    public function getEtapes() {
        return $this->etapes;
    }
    
    public function getServeur() {
        return $this->serveur;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
    
    public function setIngredients($ingredients) {
        $this->ingredients = $ingredients;
    }
    
    public function setEtapes($etapes) {
        $this->etapes = $etapes;
    }
    
    public function setServeur($serveur) {
        $this->serveur = $serveur;
    }
    
}

class RecetteManager{
        
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function addRecipe($recette) {
        $requete = $this->pdo->prepare("INSERT INTO recettes (name, image, ingredients, etapes) VALUES (:nom, :description, :image, :ingredients, :etapes)");
        $requete->bindValue(':nom', $recette->getNom());
        $requete->bindValue(':image', $recette->getImage());
        $requete->bindValue(':ingredients', $recette->getIngredients());
        $requete->bindValue(':etapes', $recette->getEtapes());
        $requete->execute();
        $recette->setId($this->pdo->lastInsertId());
    }
    
    public function deleteRecipe($recette) {
        $requete = $this->pdo->prepare("DELETE FROM recettes WHERE id=:id");
        $requete->bindValue(':id', $recette->getId());
        $requete->execute();
    }
    
    public function getAllRecipes() {
        $requete = $this->pdo->prepare("SELECT * FROM recettes");
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_CLASS, 'Recette', array($this->pdo));
        return $resultats;
    }
    
    public function getRecetteById($id) {
        $requete = $this->pdo->prepare("SELECT * FROM recette WHERE id=:id");
        $requete->bindValue(':id', $id);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_CLASS, 'Recette', array($this->pdo));
        $recette = $requete->fetch();
        return $recette;
    }
}

?>