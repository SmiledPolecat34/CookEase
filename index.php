<?php
require_once('config.php');
require_once('Back/Recette.php');

$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
$recetteManager = new RecetteManager($pdo);

$recettes = $recetteManager->getAllRecipes();

// Formatage des recettes pour éviter les problèmes avec les guillemets
$recettesJSON = json_encode($recettes, JSON_HEX_QUOT | JSON_HEX_TAG);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>
    <div class="container">
        <h1>Liste des recettes</h1>

        <a href="AjouterUneRecette.php">Ajouter une recette</a>
        <a href="Ajouter_categorie.php">Ajouter une catégorie</a>
        <a href="AjouterIngredient.php">Ajouter un ingrédient</a>

        <?php
        if (empty($recettes)) {
            echo '<div class="spinner">';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '<div></div>';
            echo '</div>';
        } else {
            echo '<div id="recipes-container">';
            foreach ($recettes as $recette) {
                echo '<div class="recipe">';
                echo '<a class="recipe-link" href="afficher_ingredients.php?recipe_id=' . $recette->getId() . '">';
                echo '<h2>' . $recette->getName() . '</h2>';
                echo '<img src="' . $recette->getImage() . '" alt="' . $recette->getName() . '">';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>
