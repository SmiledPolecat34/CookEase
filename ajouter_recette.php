<?php

require_once('Back/Recette.php');
require_once('config.php');

// Vérifie si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des données du formulaire
    $name = $_POST['name'] ?? '';
    $image_url = $_POST['image_url'] ?? '';
    $difficulty = $_POST['difficulty'] ?? '';
    $preparation_time = $_POST['preparation_time'] ?? '';
    $ustensils = $_POST['utensils'] ?? '';
    $quantity = $_POST['quantity'] ?? '';
    $category_id = $_POST['category_id'] ?? '';
    $ingredient_list = $_POST['ingredient_list'] ?? '';
    $steps = $_POST['steps'] ?? '';


    // Création d'une instance de Recette
    $recette = new Recette();
    $recette->setName($name);
    $recette->setImage($image_url);
    $recette->setDifficulty($difficulty);
    $recette->setPreparationTime($preparation_time);
    $recette->setUstensils($ustensils);
    $recette->setQuantity($quantity);
    $recette->setCategoryId($category_id);
    $recette->setIngredientList($ingredient_list);
    $recette->setSteps($steps);

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);
        
        // Création d'une instance de RecetteManager
        $recetteManager = new RecetteManager($pdo);
        
        // Ajout de la recette dans la base de données
        $recetteManager->addRecipe($recette);

        // Redirection vers la page d'accueil ou une autre page après l'ajout
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Aucune action de mise à jour n'a été demandée.";
}
?>
