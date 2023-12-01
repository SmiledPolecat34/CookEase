<?php
// Récupère l'ID de la recette depuis le paramètre GET
if (isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    // Ici, tu devrais te connecter à ta base de données et récupérer les ingrédients associés à cette recette en utilisant l'ID

    // Exemple de connexion à la base de données et récupération des ingrédients
    require_once('config.php');
    require_once('Back/Ingredient.php'); // Assurez-vous que le chemin est correct
    require_once('Back/RecetteIngredient.php');

    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
    $ingredientManager = new IngredientManager($pdo);

    // Récupération des ingrédients associés à la recette en fonction de son ID
    $ingredients = $ingredientManager->getIngredientsByRecipeId($recipe_id);

    // Affichage des ingrédients
    echo '<h1>Ingrédients pour la recette</h1>';
    echo '<ul>';
    foreach ($ingredients as $ingredient) {
        echo '<li>' . $ingredient->getName() . '</li>';
    }
    echo '</ul>';
} else {
    echo 'ID de recette non spécifié.';
}
?>
