const express = require('express');
const mysql = require('mysql');
const RecetteManager = require('./RecetteManager');

const app = express();
const port = 3000;

// Connexion à la base de données MySQL
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'cookeaseUSER',
  password: 'azerty',
  database: 'cookease'
});

connection.connect((err) => {
  if (err) {
    console.error('Erreur de connexion à la base de données :', err);
    return;
  }
  console.log('Connexion à la base de données réussie');
});

// Exemple de récupération de recettes par catégorie
app.get('/recipes/:category_id', (req, res) => {
  const categoryId = req.params.category_id;
  const recetteManager = new RecetteManager(connection);

  recetteManager.getRecipesByCategory(categoryId, (err, resultats) => {
    if (err) {
      console.error('Erreur lors de la récupération des recettes par catégorie :', err);
      res.status(500).json({ error: 'Erreur lors de la récupération des recettes par catégorie' });
    } else {
      res.json(resultats);
    }
  });
});

// Lancement du serveur
app.listen(port, () => {
  console.log(`Le serveur écoute sur le port ${port}`);
});
