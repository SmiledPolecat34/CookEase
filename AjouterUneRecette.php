
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une recette</title>
    <link rel="stylesheet" href="ajouterrecette.css">
    <script>
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

        let stepCounter = 1; // Initialisation du compteur d'étapes

function addStep() {
    const stepDescInput = document.getElementById('step_description');
    const stepDesc = stepDescInput.value.trim(); // Récupère la valeur du champ pour la description de l'étape

    if (stepDesc !== '') {
        // Création d'un nouvel élément <li> pour l'étape avec la description
        const newStep = document.createElement('li');
        
        // Numérotation de l'étape en fonction du nombre d'éléments dans la liste actuelle
        const stepNumber = document.getElementById('step_list').getElementsByTagName('li').length + 1;
        newStep.textContent = `${stepNumber}. ${stepDesc}`; // Utilisation du numéro et de la description de l'étape saisie
        
        const stepList = document.getElementById('step_list');
        stepList.appendChild(newStep);

        // Récupération de l'ensemble des étapes
        const steps = document.getElementById('step_list').getElementsByTagName('li');
        const stepData = [];
        for (let i = 0; i < steps.length; i++) {
            stepData.push(steps[i].textContent);
        }

        // Stockage des étapes au format JSON dans le champ caché
        const stepDataInput = document.getElementById('step_data');
        stepDataInput.value = JSON.stringify(stepData);

        // Remise à zéro du champ pour la description de l'étape
        stepDescInput.value = '';   

        // Incrémentation du compteur d'étapes
        stepCounter++;

        // Affichage du compteur d'étapes
        const stepCounterElement = document.getElementById('step_counter');
        stepCounterElement.textContent = stepCounter;
    }
}

    </script>
</head>
<body>
    <div class ="container">
    <h2><a href="index.php">Retour à la liste des recettes</a></h2>
    <h1>Ajouter une recette</h1>
    <form action="ajouter_recette.php" method="POST">
        
        <label for="name">Nom de la recette :</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="image_url">Image :</label>
        <input type="text" id="image_url" name="image_url" placeholder="URL de l'image"><br><br>

        <label for="difficulty">Difficulté :</label>
        <input type="text" id="difficulty" name="difficulty"><br><br>

        <label for="preparation_time">Temps de préparation (minutes) :</label>
        <input type="number" id="preparation_time" name="preparation_time"><br><br>

        <label for="utensils">Ustensiles :</label>
        <input type="text" id="utensils" name="utensils"><br><br>

        <label for="quantity">Nombre de personnes :</label>
        <input type="text" id="quantity" name="quantity"><br><br>

        <label for="category_id">Catégorie :</label>
        <select id="category_id" name="category_id">
           <!-- // boucle d'option de la bdd -->
        <?php
        // Connexion à la base de données et récupération des catégories
        require_once('config.php');
        require_once('Back/Categorie.php');

        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);

        // Récupération de toutes les catégories depuis la base de données
        $requete = $pdo->prepare("SELECT * FROM categories");
        $requete->execute();
        $categories = $requete->fetchAll(PDO::FETCH_ASSOC);

        // Affichage des catégories dans la liste déroulante
        foreach ($categories as $categorie) {
            echo '<option value="' . $categorie['id'] . '">' . $categorie['name'] . '</option>';
        }

        ?>
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
        foreach ($ingredien
        ts as $ingredient) {
            echo '<option value="' . $ingredient->getId() . '">' . $ingredient->getName() . '</option>';
            
        }
        ?>
        </select><br><br>
        
        <button type="button" onclick="addIngredientToList()">Ajouter l'ingrédient</button>
        
        <table id="ingredient_table" border="1" style="margin-top: 20px;">
            <tr>
                <th>Ingrédients ajoutés</th>
            </tr>
        </table>

        <!-- Champ caché pour stocker les étapes au format JSON -->
        <input type="text" id="step_data" name="steps" />

        <!-- Champ pour écrire la description de l'étape -->
        <input type="text" id="step_description" name="step[]" placeholder="Description de l'étape">

        <span id="step_counter"></span>

        
        <button type="button" onclick="addStep()">Nouvelle étape</button>

        <!-- Liste des étapes -->
        <ol id="step_list"></ol>

        <input type="submit" value="Ajouter la recette">
    </form>
    </div>
</body>
</html>

