<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajouterrecette.css">
    <title>Search Form</title>
</head>
<body>
    <div class="container">

<?php
// afficher_ingredients.php
// Récupère l'ID de la recette depuis le paramètre GET
if (isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    // Exemple de connexion à la base de données et récupération des ingrédients et des étapes de préparation
    require_once('config.php');
    require_once('Back/Ingredient.php');
    require_once('Back/RecetteIngredient.php');
    require_once('Back/ajouter_etapes.php');

    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
    $ingredientManager = new IngredientManager($pdo);
    $stepManager = new StepsManager($pdo);

    // Récupération des ingrédients associés à la recette en fonction de son ID
    $ingredients = $ingredientManager->getIngredientsByRecipeId($recipe_id);

    // Affichage des ingrédients
    echo '<div class="ingredients-container">';
    echo '<h1>Ingrédients pour la recette</h1>';
    echo '<ul class="ingredients-list">';
    foreach ($ingredients as $ingredient) {
        echo '<li>' . $ingredient->getName() . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    
    // Récupération des étapes de préparation associées à la recette en fonction de son ID
    $steps = $stepManager->getStepsByRecipeId($recipe_id);
    
// Affichage des étapes de préparation
echo '<div class="steps-container">';
echo '<h1>Étapes de préparation</h1>';
echo '<ul class="steps-list">';
foreach ($steps as $step) {
    echo '<li>' . $step->getSteps() . '</li>';
}
echo '</ul>';
echo '</div>';
} else {
    echo "Aucune recette n'a été sélectionnée.";
}
?>


</div></body>
</html>

