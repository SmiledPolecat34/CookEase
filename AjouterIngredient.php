<?php

require_once('Back/Ingredient.php');
require_once('config.php');

// Vérifie si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $ingredient_name = $_POST['ingredient_name'] ?? '';

    // Création d'une instance de Ingredient
    $ingredient = new Ingredient();
    $ingredient->setName($ingredient_name);

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);
        
        // Préparation et exécution de la requête SQL pour ajouter l'ingrédient
        $requete = $pdo->prepare("INSERT INTO ingredients (name) VALUES (:name)");
        $requete->bindValue(':name', $ingredient->getName());
        $requete->execute();

        // Redirection vers la page d'accueil ou une autre page après l'ajout
        header('Location: index.php');
        exit(); 
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    
    echo "Aucune donnée n'a été soumise.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="ajouterrecette.css">
    <meta charset="UTF-8">
    <title>Ajouter un ingrédient</title>
    
</head>
<body>
    <div class ="container">
    <h2><a href="index.php">Retour à la liste des recettes</a></h2>
    <h1>Ajouter un ingrédient</h1>
    <form action="AjouterIngredient.php" method="post">
        <label for="ingredient_name">Nom de l'ingrédient :</label>
        <input type="text" id="ingredient_name" name="ingredient_name"><br><br>

        <input type="submit" value="Ajouter l'ingrédient">
    </form>
    </div>
</body>
</html>
