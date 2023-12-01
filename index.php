<!-- index.php -->
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
                foreach ($results as $recette) {
                    echo '<div>';
                    echo '<a class="recipe-link" href="afficher_ingredients.php?recipe_id=' . $recette->getId() . '">';
                    echo '<h2>' . $recette->getName() . '</h2>';
                    echo '<img src="' . $recette->getImage() . '" alt="' . $recette->getName() . '">';
                    echo '<p> Difficulté : ' . $recette->getDifficulty() . '</p>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>Aucune recette trouvée pour votre recherche.</p>';
            }
        } else {
            // Affiche un message si aucune recette n'est disponible
            echo '<p>Aucune recette disponible pour le moment.</p>';
        }
        ?>
    </div>

</body>
</html>
