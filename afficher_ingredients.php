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
    $etapeManager = new EtapeManager($pdo);
    // $etape = new Etape();

    // Récupération des ingrédients associés à la recette en fonction de son ID
    $ingredients = $ingredientManager->getIngredientsByRecipeId($recipe_id);

    // Récupération des étapes de préparation associées à la recette en fonction de son ID
    $steps = $etapeManager->getEtapeByRecipeId($recipe_id);

    // Affichage des ingrédients
    echo '<h1>Ingrédients pour la recette</h1>';
    echo '<ul>';
    foreach ($ingredients as $ingredient) {
        echo '<li>' . $ingredient->getName() . '</li>';
    }
    echo '</ul>';

    // Affichage des étapes de préparation
    echo '<h1>Étapes de préparation</h1>';
    echo '<ol>';
    foreach ($steps as $step) {
        echo '<li>' . $step->getEtape() . '</li>';
    }
    echo '</ol>';
} else {
    echo 'ID de recette non spécifié.';
}
?>
