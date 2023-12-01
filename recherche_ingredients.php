<?php
// recherche_ingredients.php
// Connexion à la base de données
require_once('config.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);

// Vérifie si une recherche a été soumise
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Effectuer la recherche dans la base de données
    $query = "SELECT r.* FROM recettes r 
              INNER JOIN recette_ingredient ri ON r.id = ri.recette_id
              INNER JOIN ingredients i ON ri.ingredient_id = i.id
              WHERE r.name LIKE :search OR i.name LIKE :search";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':search', '%' . $search . '%');
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats de la recherche
    foreach ($results as $result) {
        echo '<div>';
        echo '<h2>' . $result['name'] . '</h2>';
        // Affiche d'autres détails de la recette si nécessaire
        // ...
        echo '</div>';
    }
}

?>
