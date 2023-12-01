<!-- AjouterUneRecette.php -->

<!DOCTYPE html>
<link rel="stylesheet" href="ajouterrecette.css">
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter une recette</title>
        <!-- Ajoute ici tes liens vers des fichiers CSS ou des CDN pour le style -->
    <script>
        function handleFileInputChange() {
            const fileInput = document.getElementById('image_file');
            const imageUrlInput = document.getElementById('image_url');
            const deleteFileButton = document.getElementById('delete_file_button');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imageUrlInput.value = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
                deleteFileButton.style.display = 'inline'; // Affiche le bouton "Supprimer"
            }
        }

        function deleteSelectedFile() {
            const fileInput = document.getElementById('image_file');
            const imageUrlInput = document.getElementById('image_url');
            const deleteFileButton = document.getElementById('delete_file_button');

            // Réinitialise les champs et cache le bouton "Supprimer"
            fileInput.value = '';
            imageUrlInput.value = '';
            deleteFileButton.style.display = 'none';
        }

        function addIngredientToList() {
            var ingredientList = document.getElementById('ingredient_list');
            var selectedIngredients = [];
            for (var i = 0; i < ingredientList.options.length; i++) {
                if (ingredientList.options[i].selected) {
                    selectedIngredients.push(ingredientList.options[i].text);
                }
            }

            var ingredientTable = document.getElementById('ingredient_table');
            for (var i = 0; i < selectedIngredients.length; i++) {
                var newRow = ingredientTable.insertRow(ingredientTable.rows.length);
                var cell = newRow.insertCell(0);
                cell.innerHTML = selectedIngredients[i];
            }
        }
    </script>
</head>
<body>
    <div class="container">
    <h2><a href="index.php">Retour à la liste des recettes</a></h2>
    <h1>Ajouter une recette</h1>
    <form action="ajouter_recette.php" method="post" enctype="multipart/form-data">
        <label for="name">Nom de la recette :</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="image">Image :</label>
        <input type="text" id="image_url" name="image_url" placeholder="URL de l'image"><br><br>

        <input type="file" id="image_file" name="image_file" onchange="handleFileInputChange()"><br><br>

        <!-- Bouton pour supprimer la sélection du fichier -->
        <button type="button" id="delete_file_button" style="display: none;" onclick="deleteSelectedFile()">Supprimer</button><br><br>

        <label for="difficulty">Difficulté :</label>
        <input type="text" id="difficulty" name="difficulty"><br><br>

        <label for="preparation_time">Temps de préparation (minutes) :</label>
        <input type="number" id="preparation_time" name="preparation_time"><br><br>

        <label for="ustensils">Ustensils :</label>
        <input type="text" id="ustensils" name="utensils"><br><br>

        <label for="quantity">Nombre de personnes :</label>
        <input type="text" id="quantity" name="quantity"><br><br>

        <label for="category_id">Catégorie :</label>
        <select id="category_id" name="category_id">
            <option value="1">Entrée</option>
            <option value="2">Plat</option>
            <option value="3">Dessert</option>
            <option value="4">Boisson</option>
            <option value="5">Sauce</option>
            <option value="6">Accompagnement</option>
        </select><br><br>

        <label for="ingredient_list">Sélectionner les ingrédients :</label>
        <select id="ingredient_list" name="ingredient_list[]" multiple>
        <?php
        // Connexion à la base de données et récupération des ingrédients
        require_once('config.php');
        require_once('Back/Ingredient.php');

        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);
        $ingredientManager = new IngredientManager($pdo);

        // Récupération de tous les ingrédients depuis la base de données
        $ingredients = $ingredientManager->getAllIngredients();

        // Affichage des ingrédients dans la liste déroulante
        foreach ($ingredients as $ingredient) {
            echo '<option value="' . $ingredient->getId() . '">' . $ingredient->getName() . '</option>';
            // Si l'ingrédient est sélectionné, ajoute l'attribut "selected" à l'option
        }
        ?>
        </select><br><br>
        
        <button type="button" onclick="addIngredientToList()">Ajouter l'ingrédient</button>
        
        <table id="ingredient_table" border="1" style="margin-top: 20px;">
            <tr>
                <th>Ingrédients ajoutés</th>
            </tr>
        </table>

        

        <input type="submit" value="Ajouter la recette">
    </form>
</body>
</html>