<?php
require_once('Recette.php');
require_once('Categorie.php');
require_once('Ingredient.php');
require_once('RecetteIngredient.php');
require_once('config.php');

// Créer la connexion à la base de données
$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);

// Gestionnaire de recettes
$recetteManager = new RecetteManager($pdo);

// Récupération des recettes par catégorie
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $recipes = $recetteManager->getRecipesByCategory($category_id);
    header('Content-Type: application/json');
    echo json_encode($recipes);
    exit();
}
?>
