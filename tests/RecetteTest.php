<?php

// RecetteTest.php

require_once ('config.php');
require_once ('./Back/Recette.php');

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

    // public function testGetDescription() {
    //     $recette = new Recette();
    //     $recette->setDescription('Couper les tomates en rondelles');
    //     $this->assertEquals('Couper les tomates en rondelles', $recette->getDescription());
    // }

    public function testGetImage() {
        $recette = new Recette();
        $recette->setImage('tomate.jpg');
        $this->assertEquals('tomate.jpg', $recette->getImage());
    }

    public function testDifficulty(){
        $recette = new Recette();
        $recette->setDifficulty('Facile');
        $this->assertEquals('Facile', $recette->getDifficulty());
    }

    public function testGetPreparationTime() {
        $recette = new Recette();
        $recette->setPreparationTime(10);
        $this->assertEquals(10, $recette->getPreparationTime());
    }

    public function testGetUtensils() {
        $recette = new Recette();
        $recette->setUtensils('Couteau');
        $this->assertEquals('Couteau', $recette->getUtensils());
    }

    public function testGetQuantity() {
        $recette = new Recette();
        $recette->setQuantity(1);
        $this->assertEquals(1, $recette->getQuantity());
    }

    public function testGetCategoryId() {
        $recette = new Recette();
        $recette->setCategoryId(1);
        $this->assertEquals(1, $recette->getCategoryId());
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

    // public function testSetDescription() {

    //     $recette = new Recette();
    //     $recette->setDescription('Couper les tomates en rondelles');
    //     $this->assertEquals('Couper les tomates en rondelles', $recette->getDescription());
    // }

    public function testSetImage() {
        $recette = new Recette();
        $recette->setImage('tomate.jpg');
        $this->assertEquals('tomate.jpg', $recette->getImage());
    }

    public function testSetDifficulty() {
        $recette = new Recette();
        $recette->setDifficulty('Facile');
        $this->assertEquals('Facile', $recette->getDifficulty());
    }

    public function testSetPreparationTime() {
        $recette = new Recette();
        $recette->setPreparationTime(10);
        $this->assertEquals(10, $recette->getPreparationTime());
    }

    public function testSetUtensils() {
        $recette = new Recette();
        $recette->setUtensils('Couteau');
        $this->assertEquals('Couteau', $recette->getUtensils());
    }

    public function testSetQuantity() {
        $recette = new Recette();
        $recette->setQuantity(1);
        $this->assertEquals(1, $recette->getQuantity());
    }

    public function testSetCategoryId() {
        $recette = new Recette();
        $recette->setCategoryId(1);
        $this->assertEquals(1, $recette->getCategoryId());
    }

    public function addRecipeTest(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDescription('Couper les tomates en rondelles');
        $recette->setImage('tomate.jpg');
        $recette->setDifficulty('Facile');
        $recette->setPreparationTime(10);
        $recette->setUtensils('Couteau');
        $recette->setQuantity(1);
        $recette->setCategoryId(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Couper les tomates en rondelles', $recette->getDescription());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals('Facile', $recette->getDifficulty());
        $this->assertEquals(10, $recette->getPreparationTime());
        $this->assertEquals('Couteau', $recette->getUtensils());
        $this->assertEquals(1, $recette->getQuantity());
        $this->assertEquals(1, $recette->getCategoryId());
    }

    public function updateRecipeTest(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDescription('Couper les tomates en rondelles');
        $recette->setImage('tomate.jpg');
        $recette->setDifficulty('Facile');
        $recette->setPreparationTime(10);
        $recette->setUtensils('Couteau');
        $recette->setQuantity(1);
        $recette->setCategoryId(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Couper les tomates en rondelles', $recette->getDescription());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals('Facile', $recette->getDifficulty());
        $this->assertEquals(10, $recette->getPreparationTime());
        $this->assertEquals('Couteau', $recette->getUtensils());
        $this->assertEquals(1, $recette->getQuantity());
        $this->assertEquals(1, $recette->getCategoryId());
    }

    public function deleteRecipeTest(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDescription('Couper les tomates en rondelles');
        $recette->setImage('tomate.jpg');
        $recette->setDifficulty('Facile');
        $recette->setPreparationTime(10);
        $recette->setUtensils('Couteau');
        $recette->setQuantity(1);
        $recette->setCategoryId(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Couper les tomates en rondelles', $recette->getDescription());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals('Facile', $recette->getDifficulty());
        $this->assertEquals(10, $recette->getPreparationTime());
        $this->assertEquals('Couteau', $recette->getUtensils());
        $this->assertEquals(1, $recette->getQuantity());
        $this->assertEquals(1, $recette->getCategoryId());
    }

    public function getRecipeByCategoryTest(){
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setDescription('Couper les tomates en rondelles');
        $recette->setImage('tomate.jpg');
        $recette->setDifficulty('Facile');
        $recette->setPreparationTime(10);
        $recette->setUtensils('Couteau');
        $recette->setQuantity(1);
        $recette->setCategoryId(1);
        $this->assertEquals('Salade de tomate', $recette->getName());
        $this->assertEquals('Couper les tomates en rondelles', $recette->getDescription());
        $this->assertEquals('tomate.jpg', $recette->getImage());
        $this->assertEquals('Facile', $recette->getDifficulty());
        $this->assertEquals(10, $recette->getPreparationTime());
        $this->assertEquals('Couteau', $recette->getUtensils());
        $this->assertEquals(1, $recette->getQuantity());
        $this->assertEquals(1, $recette->getCategoryId());
    }
    public function testGetIngredientList() {
        $recette = new Recette();
        $ingredients = ['Tomate', 'Laitue', 'Oignon'];
        $recette->setIngredientList($ingredients);
        $this->assertEquals($ingredients, $recette->getIngredientList());
    }
    
    public function testSetIngredientList() {
        $recette = new Recette();
        $ingredients = ['Tomate', 'Laitue', 'Oignon'];
        $recette->setIngredientList($ingredients);
        $this->assertEquals($ingredients, $recette->getIngredientList());
    }
    
    public function testGetSteps() {
        $recette = new Recette();
        $steps = ['Étape 1', 'Étape 2', 'Étape 3'];
        $recette->setSteps($steps);
        $this->assertEquals($steps, $recette->getSteps());
    }
    
    public function testSetSteps() {
        $recette = new Recette();
        $steps = ['Étape 1', 'Étape 2', 'Étape 3'];
        $recette->setSteps($steps);
        $this->assertEquals($steps, $recette->getSteps());
    }
    
    public function testSetImageInvalidUrl() {
        $recette = new Recette();
        $recette->setImage('url_non_valide');
        $this->assertNull($recette->getImage());
    }
    
    public function testAddRecipe() {
        $recette = new Recette();
        $recette->setName('Salade de tomate');
        $recette->setImage('tomate.jpg');
        $recette->setDifficulty('Facile');
        $recette->setPreparationTime(10);
        $recette->setUstensils('Couteau');
        $recette->setQuantity(1);
        $recette->setCategoryId(1);
    
        $ingredients = ['Tomate', 'Laitue', 'Oignon'];
        $recette->setIngredientList($ingredients);
    
        $steps = ['Étape 1', 'Étape 2', 'Étape 3'];
        $recette->setSteps($steps);
    
        $pdoMock = $this->createMock(PDO::FETCH_ASSOC); 
        $recetteManager = new RecetteManager($pdoMock);
        $recetteManager->addRecipe($recette);
    }
    
    
    public function testSearchRecipes() {
        $pdoMock = $this->createMock(PDO::FETCH_ASSOC);
        $recetteManager = new RecetteManager($pdoMock);
    
        $recette = new Recette();
        $recette->setName('Salade de test');
        $recette->setImage('test.jpg');
        $recette->setDifficulty('Facile');
        $recette->setPreparationTime(15);
        $recette->setUstensils('Couteau');
        $recette->setQuantity(2);
        $recette->setCategoryId(2);
    
        $recetteManager->addRecipe($recette);
    
        $searchResults = $recetteManager->searchRecipes('test');
    
        $recetteManager->deleteRecipe($recette->getId());
    
        $this->assertNotEmpty($searchResults);
    }
    
    

}

?>