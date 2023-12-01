<?php
require_once('config.php'); // Inclus ton fichier de configuration

class Etape {
    private $id;
    private $recipe_id;
    private $etape;

    public function getId() {
        return $this->id;
    }

    public function getRecipeId() {
        return $this->recipe_id;
    }

    public function getEtape() {
        return $this->etape;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRecipeId($recipe_id) {
        $this->recipe_id = $recipe_id;
    }

    public function setEtape($etape) {
        $this->etape = $etape;
    }
}

class EtapeManager{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addEtape($recipe_id, $etape) {
        $stmt = $this->pdo->prepare("UPDATE recettes SET etape = :etape WHERE id = :id");
        $stmt->bindParam(':etape', $etape);
        $stmt->bindParam(':id', $recipe_id);
        $stmt->execute();

        // Récupère l'ID de la recette
        $recipe_id = $this->pdo->lastInsertId();
    }

    public function getEtapeByRecipeId($recipe_id) {
        $sql = 'SELECT etape FROM recettes WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $recipe_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'etape');
        $etape = $stmt->fetchAll();
        return $etape;
    }
}

// Vérifie si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $recipe_id = $_POST['recipe_id'] ?? '';
    $etape = $_POST['etape'] ?? '';

    // Création d'une instance d'Étape
    $etape = new Etape();
    $etape->setRecipeId($recipe_id);
    $etape->setEtape($etape);

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);
        
        // Insertion des étapes dans la base de données 
        $stmt = $pdo->prepare("INSERT INTO recettes (etape) VALUES (:etape) WHERE id = :id");
        $stmt->bindParam(':etape', $etape->getEtape());
        $stmt->bindParam(':id', $etape->getRecipeId());
        $stmt->execute();

        // Redirection vers la page d'accueil ou une autre page après l'ajout des étapes
        header('Location: index.php');
        exit(); // Assure-toi de terminer le script après la redirection
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Si aucune donnée n'a été soumise
    echo "Aucune donnée n'a été soumise pour les étapes de la recette.";
}
?>