<?php
require_once('config.php');
require_once('Back/Recette.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['recipe_id'])) {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
        $recetteManager = new RecetteManager($pdo);

        $recipe_id = $_POST['recipe_id'];
        $recipeToDelete = $recetteManager->getRecipeById($recipe_id);

        if ($recipeToDelete) {
            $recetteManager->deleteRecipe($recipeToDelete);
            header("Location: index.php"); // Redirige vers la page principale après la suppression
            exit();
        } else {
            echo 'La recette à supprimer n\'existe pas.';
        }
    }
}
?>
