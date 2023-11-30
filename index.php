<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    
    <a href="AjouterUneRecette.php">Ajouter une recette</a>
    
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

    // Création d'une instance de RecetteManager
    $recetteManager = new RecetteManager($pdo);
    
    $category_id = 1; // À adapter selon ta logique
    // Récupération de toutes les recettes
    $recettes = $recetteManager->getRecipesByCategory($category_id); // À adapter selon ta logique
    
    // Affichage des recettes
    foreach ($recettes as $recette) {
        echo '<div class="card mb-3">';
        echo '<img src="' . $recette->getImage() . '" class="card-img-top" alt="' . $recette->getName() . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $recette->getName() . '</h5>';
        echo '<p class="card-text">Difficulté : ' . $recette->getDifficulty() . '</p>';
        echo '<p class="card-text">Temps de préparation : ' . $recette->getPreparationTime() . ' minutes</p>';
        echo '<p class="card-text">Ustensiles : ' . $recette->getUstensils() . '</p>';
        echo '<p class="card-text">Quantité : ' . $recette->getQuantity() . '</p>';
        echo '</div>';
        echo '</div>';
    }
    
    ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
