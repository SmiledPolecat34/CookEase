<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
    <!-- Ajoute ici tes liens vers des fichiers CSS ou des CDN pour le style -->
</head>
<body>
    <h1>Liste des recettes</h1>
    
    <a href="AjouterUneRecette.php">Ajouter une recette</a>
    
    <?php
    // Inclure ici les fichiers Recette.php, Categorie.php, Ingredient.php et RecetteIngredient.php
    require_once('Back/Recette.php');
    require_once('Back/Categorie.php');
    require_once('Back/Ingredient.php');
    require_once('Back/RecetteIngredient.php'); 
    require_once('config.php');
    
    // Connexion à la base de données (à remplir avec tes informations de connexion)
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);
    
    // Création d'une instance de RecetteManager
    $recetteManager = new RecetteManager($pdo);
    
    $category_id = 1; // À adapter selon ta logique
    // Récupération de toutes les recettes
    $recettes = $recetteManager->getRecipesByCategory($category_id); // À adapter selon ta logique
    
    // Affichage des recettes
    foreach ($recettes as $recette) {
        echo '<div>';
        echo '<h2>' . $recette->getName() . '</h2>';
        echo '<img src="' . $recette->getImage() . '" alt="' . $recette->getName() . '">';
        echo '<p>Difficulté : ' . $recette->getDifficulty() . '</p>';
        echo '<p>Temps de préparation : ' . $recette->getPreparationTime() . ' minutes</p>';
        echo '<p>Ustensiles : ' . $recette->getUtensils() . '</p>';
        echo '<p>Quantité : ' . $recette->getQuantity() . '</p>';
        echo '</div>';
    }
    ?>
</body>
</html>
