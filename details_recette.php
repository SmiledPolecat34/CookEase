<?php
// Inclure ici les fichiers Recette.php, Categorie.php, Ingredient.php et RecetteIngredient.php
require_once('./Back/Recette.php');
require_once('./Back/Categorie.php');
require_once('./Back/Ingredient.php');
require_once('./Back/RecetteIngredient.php'); 
require_once('./Tests/config.php');

try {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit();
}

// Récupérer l'ID de la recette depuis l'URL
if (isset($_GET['id'])) {
    $recette_id = $_GET['id'];
    
    // Création d'une instance de RecetteManager
    $recetteManager = new RecetteManager($pdo);
    
    // Récupération de la recette par ID
    $recette = $recetteManager->getRecipeById($recette_id);
    
    // Affichage des détails de la recette
    echo '<h2>' . $recette->getName() . '</h2>';
    echo '<img src="' . $recette->getImage() . '" alt="' . $recette->getName() . '">';
    echo '<p>Difficulté : ' . $recette->getDifficulty() . '</p>';
    echo '<p>Temps de préparation : ' . $recette->getPreparationTime() . ' minutes</p>';
    echo '<p>Ustensiles : ' . $recette->getUstensils() . '</p>';
    echo '<p>Quantité : ' . $recette->getQuantity() . '</p>';
} else {
    echo 'ID de recette non spécifié.';
}
?>
