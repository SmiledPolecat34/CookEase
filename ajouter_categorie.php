<?php
require_once('Back/Categorie.php'); 
require_once('config.php');

// Vérifie si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $category_name = $_POST['category_name'] ?? '';

    // Création d'une instance de Categorie
    $categorie = new Categorie();
    $categorie->setName($category_name);

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);
        
        // Requête pour ajouter la catégorie dans la base de données
        $requete = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $requete->bindValue(':name', $categorie->getName());
        $requete->execute();

        // Redirection vers une page après l'ajout
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
    <title>Ajouter une catégorie</title>
    
</head>
<body>
    <div class ="container">
    <h2><a href="index.php">Retour à la liste des recettes</a></h2>
    <h1>Ajouter une catégorie</h1>
    <form action="ajouter_categorie.php" method="post">
        <label for="category_name">Nom de la catégorie :</label>
        <input type="text" id="category_name" name="category_name"><br><br>

        <input type="submit" value="Ajouter la catégorie">
    </form>
    </div>
</body>
</html>

