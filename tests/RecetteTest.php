<?php

require_once('config.php');
require_once('./Back/Recette.php');

use PHPUnit\Framework\TestCase;

class RecetteTest extends TestCase {

    public function testGetId() {
        $recette = new Recette();
        $recette->setId(1);
        $this->assertEquals(1, $recette->getId());
    }

    public function testGetName() {
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $this->assertEquals('Salade de tomate', $recette->getName());
    }

    public function testGetImage() {
        $recette = new Recette();
        $recette->setImage('tomate.jpg');
        $this->assertEquals('tomate.jpg', $recette->getImage());
    }

    public function testDifficulte(){
        $recette = new Recette();
        $recette->setDifficulte('Facile');
        $this->assertEquals('Facile', $recette->getDifficulte());
    }

    public function testGetTempsPreparation() {
        $recette = new Recette();
        $recette->setTempsPreparation(10);
        $this->assertEquals(10, $recette->getTempsPreparation());
    }

    public function testGetUstensiles() {
        $recette = new Recette();
        $recette->setUstensiles('Couteau');
        $this->assertEquals('Couteau', $recette->getUstensiles());
    }

    public function testGetQuantite() {
        $recette = new Recette();
        $recette->setQuantite(1);
        $this->assertEquals(1, $recette->getQuantite());
    }

    public function testGetIdCategorie() {
        $recette = new Recette();
        $recette->setIdCategorie(1);
        $this->assertEquals(1, $recette->getIdCategorie());
    }

    public function testSetId() {
        $recette = new Recette();
        $recette->setId(1);
        $this->assertEquals(1, $recette->getId());
    }

    public function testSetName() {
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $this->assertEquals('Salade de tomate', $recette->getName());
    }

    public function testSetImage() {
        $recette = new Recette();
        $recette->setImage('tomate.jpg');
        $this->assertEquals('tomate.jpg', $recette->getImage());
    }

    public function testSetDifficulte() {
        $recette = new Recette();
        $recette->setDifficulte('Facile');
        $this->assertEquals('Facile', $recette->getDifficulte());
    }

    public function testSetTempsPreparation() {
        $recette = new Recette();
        $recette->setTempsPreparation(10);
        $this->assertEquals(10, $recette->getTempsPreparation());
    }

    public function testSetUstensiles() {
        $recette = new Recette();
        $recette->setUstensiles('Couteau');
        $this->assertEquals('Couteau', $recette->getUstensiles());
    }

    public function testSetQuantite() {
        $recette = new Recette();
        $recette->setQuantite(1);
        $this->assertEquals(1, $recette->getQuantite());
    }

    public function testSetIdCategorie() {
        $recette = new Recette();
        $recette->setIdCategorie(1);
        $this->assertEquals(1, $recette->getIdCategorie());
    }

    public function testAjouterRecette(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDifficulte('Facile');
        $recette->setImage('tomate.jpg');
        $recette->setTempsPreparation(10);
        $recette->setUstensiles('Couteau');
        $recette->setQuantite(1);
        $recette->setIdCategorie(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Facile', $recette->getDifficulte());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals(10, $recette->getTempsPreparation());
        $this->assertEquals('Couteau', $recette->getUstensiles());
        $this->assertEquals(1, $recette->getQuantite());
        $this->assertEquals(1, $recette->getIdCategorie());
    }

    public function testMettreAJourRecette(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDifficulte('Facile');
        $recette->setImage('tomate.jpg');
        $recette->setTempsPreparation(10);
        $recette->setUstensiles('Couteau');
        $recette->setQuantite(1);
        $recette->setIdCategorie(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Facile', $recette->getDifficulte());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals(10, $recette->getTempsPreparation());
        $this->assertEquals('Couteau', $recette->getUstensiles());
        $this->assertEquals(1, $recette->getQuantite());
        $this->assertEquals(1, $recette->getIdCategorie());
    }

    public function testSupprimerRecette(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDifficulte('Facile');
        $recette->setImage('tomate.jpg');
        $recette->setTempsPreparation(10);
        $recette->setUstensiles('Couteau');
        $recette->setQuantite(1);
        $recette->setIdCategorie(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Facile', $recette->getDifficulte());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals(10, $recette->getTempsPreparation());
        $this->assertEquals('Couteau', $recette->getUstensiles());
        $this->assertEquals(1, $recette->getQuantite());
        $this->assertEquals(1, $recette->getIdCategorie());
    }

    public function testRecettesParCategorie(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDifficulte('Facile');
        $recette->setImage('tomate.jpg');
        $recette->setTempsPreparation(10);
        $recette->setUstensiles('Couteau');
        $recette->setQuantite(1);
        $recette->setIdCategorie(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Facile', $recette->getDifficulte());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals(10, $recette->getTempsPreparation());
        $this->assertEquals('Couteau', $recette->getUstensiles());
        $this->assertEquals(1, $recette->getQuantite());
        $this->assertEquals(1, $recette->getIdCategorie());
    }
    
}

?>
