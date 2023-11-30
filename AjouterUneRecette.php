<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une recette</title>
    <!-- Ajoute ici tes liens vers des fichiers CSS ou des CDN pour le style -->
</head>
<body>
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
        <input type="text" id="ustensils" name="ustensils"><br><br>

        <label for="quantity">Quantité :</label>
        <input type="text" id="quantity" name="quantity"><br><br>

        <a><input type="submit" value="Ajouter la recette"></a>
    </form>
</body>
</html>
