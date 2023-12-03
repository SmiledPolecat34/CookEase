<?php
require_once('config.php');
require_once('Back/Recette.php');

$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
$recetteManager = new RecetteManager($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $recipe_id = $_POST['id'];
    $recetteManager->deleteRecipeById($recipe_id);
    header("Location: index.php"); // Redirection vers la page principale après suppression
    exit();
}

$recettes = $recetteManager->getAllRecipes();

// Formatage des recettes pour éviter les problèmes avec les guillemets
$recettesJSON = json_encode($recettes, JSON_HEX_QUOT | JSON_HEX_TAG);

?>

<!DOCTYPE html>
<link rel="stylesheet" href="ajouterrecette.css">
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>
    <div class="container">
        <h1>Liste des recettes</h1>
        <div class="nav">
            <a href="AjouterUneRecette.php">Ajouter une recette</a>
            <a href="Ajouter_categorie.php">Ajouter une catégorie</a>
            <a href="AjouterIngredient.php">Ajouter un ingrédient</a>
        </div>

        <!-- Barre de recherche -->
    <form action="index.php" method="GET"> <!-- Le formulaire envoie les données à index.php -->
        <label for="search">Rechercher une recette ou un ingrédient :</label>
        <input type="text" id="search" name="search" placeholder="Nom de la recette ou de l'ingrédient">
        <button type="submit">Rechercher</button>
    </form>

    <div id="recipes-container">
        <!-- Affichage des images avec des liens -->
        <?php
        require_once('config.php');
        require_once('Back/Recette.php');

        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
        $recetteManager = new RecetteManager($pdo);

        // Vérifier si une recherche a été effectuée
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
        
            // Utilise la méthode searchRecipes pour récupérer les résultats de la recherche
            $results = $recetteManager->searchRecipes($searchTerm);
        
            // Affichage des résultats de la recherche
            if (count($results) > 0) {
                foreach ($results as $result) {
                    // Utiliser les valeurs de $result pour créer une instance de Recette
                    $recette = new Recette();
                    $recette->setId($result['id']);
                    $recette->setName($result['name']);
                    $recette->setImage($result['image_url']);
                    $recette->setDifficulty($result['difficulty']);
                    $recette->setPreparationTime($result['preparation_time']);
                    $recette->setUstensils($result['utensils']);
                    $recette->setQuantity($result['quantity']);
                    $recette->setCategoryId($result['category_id']);
                
                    // Utiliser $recette pour accéder aux propriétés et méthodes de la classe Recette
                    echo '<div>';
                    echo '<a class="recipe-link" href="afficher_ingredients.php?recipe_id=' . $recette->getId() . '">';
                    echo '<h2>' . $recette->getName() . '</h2>';
                    echo '<img src="' . $recette->getImage() . '" alt="' . $recette->getName() . '">';
                    echo '<p> Difficulté : ' . $recette->getDifficulty() . '</p>';
                    echo '</a>';

                    echo '<form method="POST" action="index.php">';
                    echo '<input type="hidden" name="id" value="' . $recette->getId() . '">';
                    echo '<button type="submit">Supprimer cette recette</button>';
                    echo '</form>';
                            
                    echo '</div>';
                }
    } else {
    echo '<p>Aucune recette trouvée pour votre recherche.</p>';
    }                
            } 
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['id'])) {
                    $recipe_id = $_POST['id'];
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
            else {
                echo '<p>Aucune recette trouvée pour votre recherche.</p>';
        }
        
    ?>
</body>

</html>
