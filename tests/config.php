<?php

// Configuration de la base de données
$host = 'localhost';
$dbname = 'cookease';
$username = 'cookeaseUSER';  
$password = 'azerty'; 
$port = '3306';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
