<?php
// Connexion à la base de données
require_once('config.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';port='.$port, $username, $password);

// Vérifie si une recherche a été soumise
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Effectuer la recherche dans la base de données
    $query = "SELECT * FROM ingredients WHERE name LIKE :search";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':search', '%' . $search . '%');
    $statement->execute();
    $ingredients = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats de la recherche
    foreach ($ingredients as $ingredient) {
        echo '<div>';
        echo '<p>' . $ingredient['name'] . '</p>';
        echo '<button onclick="addIngredient(' . $ingredient['id'] . ')">Ajouter</button>';
        echo '</div>';
    }

    if (isset($_GET['search'])) {
        // ... (Ton code PHP pour la recherche d'ingrédients ici)
    
        echo '<h2>Liste des ingrédients sélectionnés :</h2>';
        echo '<ul id="ingredientList"></ul>';
    
        echo '<script>';
        echo 'function addIngredient(id) {';
        echo '    const ingredient = document.createElement(\'li\');';
        echo '    ingredient.textContent = \'Ingrédient \' + id;';
        echo '    document.getElementById(\'ingredientList\').appendChild(ingredient);';
        echo '}';
        echo '</script>';
    }
}
?>
