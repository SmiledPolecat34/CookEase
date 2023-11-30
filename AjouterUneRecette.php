<!DOCTYPE html>
<html lang="fr">
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

        <input type="submit" value="Ajouter la recette">
    </form>
</body>
</html>

<?php

// AjouterUneRecette.php

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

// Récupération des données du formulaire
$name = $_POST['name'];
$image_url = $_POST['image_url'];
$difficulty = $_POST['difficulty'];
$preparation_time = $_POST['preparation_time'];
$ustensils = $_POST['ustensils'];
$quantity = $_POST['quantity'];

// Création d'une instance de Recette
$recette = new Recette();
$recette->setName($name);
$recette->setImage($image_url);
$recette->setDifficulty($difficulty);
$recette->setPreparationTime($preparation_time);
$recette->setUstensils($ustensils);
$recette->setQuantity($quantity);

// Ajout de la recette dans la base de données
$recetteManager->addRecipe($recette);

// Redirection vers la page d'accueil
header('Location: index.php');
 
?>