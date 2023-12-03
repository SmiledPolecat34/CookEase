<?php
require_once('config.php');

class Steps {
    private $id;
    private $recipe_id;
    private $steps;

    public function getId() {
        return $this->id;
    }

    public function getRecipeId() {
        return $this->recipe_id;
    }

    public function getSteps() {
        return $this->steps;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRecipeId($recipe_id) {
        $this->recipe_id = $recipe_id;
    }

    public function setSteps($steps) {
        // Vérifie si $steps est une chaîne JSON et le convertit en tableau
        $this->steps = is_string($steps) ? json_decode($steps, true) : $steps;
    }
}

class StepsManager{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addSteps(Steps $steps) {
        $requete = $this->pdo->prepare("UPDATE recettes SET steps = :steps WHERE id = :id");
        $requete->bindValue(':steps', $steps->getSteps());
        $requete->bindValue(':id', $steps->getRecipeId());
        $requete->execute();
    }

    public function getStepsByRecipeId($recipe_id) {
        $requete = $this->pdo->prepare("SELECT steps FROM recettes WHERE id = :recipe_id");
        $requete->bindValue(':recipe_id', $recipe_id);
        $requete->execute();
        $stepsData = $requete->fetch(PDO::FETCH_ASSOC);
    
        if ($stepsData) {
            $steps = new Steps();
            $steps->setRecipeId($recipe_id);
            $steps->setSteps($stepsData['steps']);
            return $steps;
        } else {
            return null;
        }
    }
    
    
}

