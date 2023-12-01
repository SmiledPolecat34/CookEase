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
    <style>
        /* Ajoute un style pour que les images soient des liens cliquables */
        .recipe-link {
            display: inline-block;
            text-decoration: none;
            color: inherit;
        }
        .recipe-link img {
            display: block;
            width: 200px; /* Ajuste la taille des images à ta convenance */
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Liste des recettes</h1>
    
    <a href="AjouterUneRecette.php">Ajouter une recette</a>
    <a href="Ajouter_categorie.php">Ajouter une catégorie</a>
    <a href="AjouterIngredient.php">Ajouter un ingrédient</a>

    <div id="recipes-container">
        <!-- Affichage des images avec des liens -->
        <?php
        foreach ($recettes as $recette) {
            echo '<div>';
            // Crée un lien pour chaque image avec le nom de la recette comme texte du lien
            echo '<a class="recipe-link" href="afficher_ingredients.php?recipe_id=' . $recette->getId() . '">';
            echo '<h2>' . $recette->getName() . '</h2>';
            echo '<img src="' . $recette->getImage() . '" alt="' . $recette->getName() . '">';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>
