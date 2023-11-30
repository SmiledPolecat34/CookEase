<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une recette</title>
    <!-- Ajoute ici tes liens vers des fichiers CSS ou des CDN pour le style -->
</head>
<body>
    <h2><a href="index.php">Retour à la liste des recettes</a></h2>
    <h1>Ajouter une recette</h1>
    <form action="ajouter_recette.php" method="post">
        <label for="name">Nom de la recette :</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="image_url">URL de l'image :</label>
        <input type="text" id="image_url" name="image_url"><br><br>

        <label for="difficulty">Difficulté :</label>
        <input type="text" id="difficulty" name="difficulty"><br><br>

        <label for="preparation_time">Temps de préparation (minutes) :</label>
        <input type="number" id="preparation_time" name="preparation_time"><br><br>

        <label for="ustensils">Ustensiles :</label>
        <input type="text" id="ustensils" name="utensils"><br><br>

        <label for="quantity">Quantité :</label>
        <input type="text" id="quantity" name="quantity"><br><br>

        <!-- Ajout du champ Catégorie sous forme de liste déroulante -->
        <label for="category_id">Catégorie :</label>
        <select id="category_id" name="category_id">
            <option value="1">Entrée</option>
            <option value="2">Plat</option>
            <option value="3">Dessert</option>
            <option value="4">Boisson</option>
            <option value="5">Sauce</option>
            <option value="6">Accompagnement</option>
        </select><br><br>

        <!-- Pratique alimentaire -->
        <!-- MODIFIER LA BDD -->
        <!-- <label for="pratique_alimentaire">Catégorie alimentaire :</label>
        <select id="pratique_alimentaire" name="pratique_alimentaire">
            <option value="1">Carnivore</option>
            <option value="2">Omnivore</option>
            <option value="3">Carnivore</option>
            <option value="4">Végétarien</option>
            <option value="5">Végétalien</option>
            <option value="6">Sans gluten</option>
            <option value="7">Sans lactose</option>
            <option value="8">Autre</option>
        </select><br><br> -->
        <input type="submit" value="Ajouter la recette">
    </form>
    <form action="recherche_ingredients.php" method="get">
    <label for="search">Rechercher un ingrédient :</label>
    <input type="text" id="search" name="search">
    <input type="submit" value="Rechercher">
</form>

</body>
</html>
