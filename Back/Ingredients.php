<?php

require_once ('config.php');

class Ingredients{
        
        private $id;
        private $nom;
        private $quantite;
        private $unite;
        private $pdo;
        
        public function __construct($nom, $quantite, $unite, $pdo) {
            $this->nom = $nom;
            $this->quantite = $quantite;
            $this->unite = $unite;
            $this->pdo = $pdo;
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function getNom() {
            return $this->nom;
        }
        
        public function getQuantite() {
            return $this->quantite;
        }
        
        public function getUnite() {
            return $this->unite;
        }
        
        public function setId($id) {
            $this->id = $id;
        }
        
        public function setNom($nom) {
            $this->nom = $nom;
        }
        
        public function setQuantite($quantite) {
            $this->quantite = $quantite;
        }
        
        public function setUnite($unite) {
            $this->unite = $unite;
        }
        
        public function create() {
            $sql = "INSERT INTO ingredients (nom, quantite, unite) VALUES (:nom, :quantite, :unite)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'nom' => $this->nom,
                'quantite' => $this->quantite,
                'unite' => $this->unite
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
        
        public function read() {
            $sql = "SELECT * FROM ingredients WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'id' => $this->id
            ]);
            $row = $stmt->fetch();
            $this->nom = $row['nom'];
            $this->quantite = $row['quantite'];
            $this->unite = $row['unite'];
        }
        
        public function update() {
            $sql = "UPDATE ingredients SET nom = :nom, quantite = :quantite, unite = :unite WHERE id = :id";
}
?>