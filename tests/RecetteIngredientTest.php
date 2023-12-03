<?php

// RecetteIngredientTest.php

require_once ('./Back/RecetteIngredient.php');

use PHPUnit\Framework\TestCase;

class RecetteIngredientTest extends TestCase {

    public function testGetRecetteId() {
        $recetteIngredient = new RecetteIngredient();
        $recetteIngredient->setRecetteId(1);
        $this->assertEquals(1, $recetteIngredient->getRecetteId());
    }

    public function testGetIngredientId() {
        $recetteIngredient = new RecetteIngredient();
        $recetteIngredient->setIngredientId(1);
        $this->assertEquals(1, $recetteIngredient->getIngredientId());
    }

    public function testGetQuantity() {
        $recetteIngredient = new RecetteIngredient();
        $recetteIngredient->setQuantity(1);
        $this->assertEquals(1, $recetteIngredient->getQuantity());
    }

    public function testSetRecetteId() {
        $recetteIngredient = new RecetteIngredient();
        $recetteIngredient->setRecetteId(1);
        $this->assertEquals(1, $recetteIngredient->getRecetteId());
    }

    public function testSetIngredientId() {
        $recetteIngredient = new RecetteIngredient();
        $recetteIngredient->setIngredientId(1);
        $this->assertEquals(1, $recetteIngredient->getIngredientId());
    }

    public function testSetQuantity() {
        $recetteIngredient = new RecetteIngredient();
        $recetteIngredient->setQuantity(1);
        $this->assertEquals(1, $recetteIngredient->getQuantity());
    }

}
?>